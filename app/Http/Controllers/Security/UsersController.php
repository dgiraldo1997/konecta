<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\CreateUserRequest;
use App\Http\Requests\Security\EditUserRequest;
use App\Perfiles;
use App\Permisos;
use App\User;
use Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as d;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller {

    public static $permisos;
    public static $menu = 'USU';

    public function __construct() {
        $this->middleware('auth');
        if (Auth::check()) {
            UsersController::$permisos = Permisos::where('perfil', Auth::user()->perfil)
                    ->where('menu', UsersController::$menu)
                    ->first();
            $this->middleware('permisos:' . UsersController::$permisos->acceso);
        }
    }

    public function index(d $request) {
        $clientes = User::filtrarYPaginar($request->documento,$request->name,$request->telefono, $request->direccion, $request->activo);
        $users = User::orderBy('perfil')->paginate();
        $permisos = UsersController::$permisos;
        return view('security.users.index', compact('users', 'permisos'));
    }

    public function create() {
        //VALIDANDO PERMISOS DE ACCESO...
        if (UsersController::$permisos->crear) {
            $perfiles = Perfiles::select('id', 'nombre')->get();
            $arrayperfiles = array("" => "Selecione un perfil...");
            foreach ($perfiles as $perfil) {
                $arrayperfiles[$perfil->id] = $perfil->nombre;
            }
            return view('security.users.create', compact('arrayperfiles'));
        } else {
            return view('sinpermisos');
        }
    }

    public function store(CreateUserRequest $request) {
        $user = new User();
        $user->fill(\Request::all());
        $user->username = strtoupper($user->username);
        $user->save();

        return redirect()->route('security.users.index');
    }

    public function show($id) {
        
    }

    public function edit($id) {
        //VALIDANDO PERMISOS DE ACCESO...
        if (UsersController::$permisos->editar) {
            $perfiles = Perfiles::select('id', 'nombre')->get();
            $arrayperfiles = array("" => "Selecione un perfil...");
            foreach ($perfiles as $perfil) {
                $arrayperfiles[$perfil->id] = $perfil->nombre;
            }
            $user = User::findOrFail($id);
            $permisos = UsersController::$permisos;
            return view('security.users.edit', compact('user', 'arrayperfiles', 'permisos'));
        } else {
            return view('sinpermisos');
        }
    }

    public function update(EditUserRequest $request, $id) {
        $user = User::findOrFail($id);

        $user->fill(Request::all());
        $user->save();

        return redirect()->route('security.users.index');
    }

    public function destroy($id) {
        //VALIDANDO PERMISOS DE ACCESO...
        if (UsersController::$permisos->borrar) {
            $user = User::findOrFail($id);
            $user->delete();
            Session::flash('message', 'Se ha eliminado el usuario ' . $user->name);
            return redirect()->route('security.users.index');
        } else {
            return view('sinpermisos');
        }
    }

}
