<?php

namespace App\Http\Controllers\Administracion;

use App\Clientes;
use App\Http\Controllers\Controller;
use App\Permisos;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientesController extends Controller {

    public static $permisos;
    public static $menu = 'ACL';

    public function __construct() {
        $this->middleware('auth');
        if (Auth::check()) {
            ClientesController::$permisos = Permisos::where('perfil', Auth::user()->perfil)
                    ->where('menu', ClientesController::$menu)
                    ->first();
            $this->middleware('permisos:' . ClientesController::$permisos->acceso);
        }
    }

    public function index(Request $request) {
        $clientes = Clientes::filtrarYPaginar($request->documento,$request->name,$request->telefono, $request->direccion, $request->activo);
        $permisos = ClientesController::$permisos;
        return view('administracion.clientes.index', compact('clientes', 'permisos'));
    }

    public function create() {
        //VALIDANDO PERMISOS DE ACCESO...
        if (ClientesController::$permisos->crear) {
            $permisos = ClientesController::$permisos;

            return view('administracion.clientes.create', compact('permisos'));
        } else {
            return view('sinpermisos');
        }
    }

    public function store(Request $request) {
        $cliente = new Clientes();
        $cliente->fill(\Request::all());
        if (\Request::input('activo') == null) {
            $cliente->activo = 0;
        }
        $cliente->name = strtoupper($cliente->name);
        $cliente->direccion = strtoupper($cliente->direccion);
        $cliente->save();
        return redirect()->route('administracion.clientes.index');
    }

    public function show($id) {
        $clientes = Clientes::findOrFail($id);
        $permisos = ClientesController::$permisos;
        return view('administracion.clientes.show', compact('clientes', 'permisos'));
    }

    public function edit($id) {
        if (ClientesController::$permisos->editar) {
            $clientes= Clientes::findOrFail($id);
            $permisos = ClientesController::$permisos;
            return view('administracion.clientes.edit', compact('clientes','permisos'));
        } else {
            return view('sinpermisos');
        }
    }

    public function update(Request $request,$id) {
        $clientes = Clientes::findOrFail($id);
        $clientes->fill(\Request::all());

        if (\Request::input('activo') == null) {
            $clientes->activo = 0;
        }
        $clientes->name = strtoupper($clientes->name);
        $clientes->direccion = strtoupper($clientes->direccion);
        $clientes->save();

        return redirect()->route('administracion.clientes.index');
    }

    public function destroy(Request $request) {
    }

}
