<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\PermisosRequest;
use App\MenusDetalle;
use App\Perfiles;
use App\Permisos;
use Auth;
use DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PermisosController extends Controller {

    public static $permisos;
    public static $menu = 'PRM';

    public function __construct() {
        $this->middleware('auth');
        if (Auth::check()) {
            PermisosController::$permisos = Permisos::where('perfil', Auth::user()->perfil)
                    ->where('menu', PermisosController::$menu)
                    ->first();
            $this->middleware('permisos:' . PermisosController::$permisos->acceso);
        }
    }

    public function index() {
        $perfiles = Perfiles::select('id', 'nombre')->get();
        $arrayperfiles = array();
        foreach ($perfiles as $perfil) {
            $arrayperfiles[$perfil->id] = $perfil->nombre;
        }

        return view('security.permisos.index', compact('arrayperfiles'));
    }

    public function create() {
        
    }

    public function store(PermisosRequest $request) {
        $perfil = Perfiles::findOrFail(Request::input('perfil'));

        //LEYENDO TODOS LOS MENUS...
        $permisos = DB::table('menus_detalle')
                ->select('menus_detalle.id AS id', 'menus.nombre AS menu', 'menus.glyph AS menuglyph','menus_detalle.codigo AS codigo', 'menus_detalle.nombre AS menu_detalle', 'menus_detalle.glyph AS glyph', 'menus_detalle.acceso AS menuacceso', 'menus_detalle.crear AS menucrear', 'menus_detalle.editar AS menueditar', 'menus_detalle.borrar AS menuborrar', 'permisos.acceso AS permisoacceso', 'permisos.crear AS permisocrear', 'permisos.editar AS permisoeditar', 'permisos.borrar AS permisoborrar')
                ->leftJoin('menus', 'menus.id', '=', 'menus_detalle.menu')
                ->leftJoin('permisos', 'menus_detalle.codigo', '=', 'permisos.menu')
                ->where('permisos.perfil', $perfil->id)
                ->orderBy('menus.nombre')
                ->get();

        return view('security.permisos.edit', compact('perfil', 'permisos'));
    }

    public function show($id) {
        
    }

    public function edit($id) {
        
    }

    public function update($id) {
        //LLAMANDO TODOS LOS SUBMENUS...
        $menus = MenusDetalle::get();

        //RECORRIENDO CADA MENU DETALLE...
        foreach ($menus as $menu) {
            //QUERY DE ACTUALIZACION DE PERMISOS...
            $permiso = Permisos::where('perfil', Request::input('perfil'))
                    ->where('menu', Request::input($menu->codigo . 'menu'))
                    ->first();

            if (is_null(Request::input($menu->codigo . 'acceso'))) {
                $acceso = 0;
            } else {
                $acceso = Request::input($menu->codigo . 'acceso');
            }

            if (is_null(Request::input($menu->codigo . 'crear'))) {
                $crear = 0;
            } else {
                $crear = Request::input($menu->codigo . 'crear');
            }

            if (is_null(Request::input($menu->codigo . 'editar'))) {
                $editar = 0;
            } else {
                $editar = Request::input($menu->codigo . 'editar');
            }

            if (is_null(Request::input($menu->codigo . 'borrar'))) {
                $borrar = 0;
            } else {
                $borrar = Request::input($menu->codigo . 'borrar');
            }


            //dd($permiso);
            $permiso->acceso = $acceso;
            $permiso->crear = $crear;
            $permiso->editar = $editar;
            $permiso->borrar = $borrar;
            $permiso->save();
        }
        $perfiles = Perfiles::select('id', 'nombre')->get();
        $arrayperfiles = array();
        foreach ($perfiles as $perfil) {
            $arrayperfiles[$perfil->id] = $perfil->nombre;
        }

        Session::flash('mensajePermisos', 'Se han actualizado los permisos correctamente');
        return view('security.permisos.index', compact('arrayperfiles'));
    }

    public function destroy($id) {
        
    }

}
