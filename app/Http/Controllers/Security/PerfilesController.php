<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Perfiles;
use App\User;
use App\MenusDetalle;
use App\Permisos;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \App\Http\Requests\Security\CreatePerfilRequest;
use \App\Http\Requests\Security\EditPerfilRequest;

class PerfilesController extends Controller {

    public static $permisos;
    public static $menu = 'PER';

    public function __construct() {
        $this->middleware('auth');
        if (Auth::check()) {
            PerfilesController::$permisos = Permisos::where('perfil', Auth::user()->perfil)
                    ->where('menu', PerfilesController::$menu)
                    ->first();
            $this->middleware('permisos:' . PerfilesController::$permisos->acceso);
        }
    }

    public function index() {
        $permisos = PerfilesController::$permisos;
        $perfiles = Perfiles::paginate();
        return view('security.perfiles.index', compact('perfiles', 'permisos'));
    }

    public function create() {
        //VALIDANDO PERMISOS DE ACCESO...
        if (PerfilesController::$permisos->crear) {
            return view('security.perfiles.create');
        } else {
            return view('sinpermisos');
        }
    }

    public function store(CreatePerfilRequest $request) {
        #GUARDANDO EL PERFIL...
        $perfil = Perfiles::create($request->all());

        #CREANDO LOS PERMISOS...
        #LEYENDO LOS MENUS EXISTENTES...
        $menus = MenusDetalle::get();
        foreach ($menus AS $menu) {
            #CREANDO EL PERMISO AL PERFIL POR CADA MENU...
            $permiso = new Permisos();
            $permiso->perfil = $perfil->id;
            $permiso->menu = $menu->codigo;
            $permiso->acceso = 0;
            $permiso->crear = 0;
            $permiso->editar = 0;
            $permiso->borrar = 0;
            $permiso->save();
        }

        return redirect()->route('security.perfiles.index');
    }

    public function show($id) {
        $perfil = Perfiles::findOrFail($id);
        $permisos = PerfilesController::$permisos;
        return view('security.perfiles.show', compact('perfil', 'permisos'));
    }

    public function edit($id) {
        //VALIDANDO PERMISOS DE ACCESO...
        if (PerfilesController::$permisos->editar) {
            $perfil = Perfiles::findOrFail($id);
            $permisos = PerfilesController::$permisos;
            return view('security.perfiles.edit', compact('perfil', 'permisos'));
        } else {
            return view('sinpermisos');
        }
    }

    public function update(EditPerfilRequest $request, $id) {
        $perfil = Perfiles::findOrFail($id);
        $perfil->fill(\Request::all());
        $perfil->save();
        return redirect()->route('security.perfiles.index');
    }

    public function destroy(Request $request) {
        $id = $request->id;
        $perfil = Perfiles::findOrFail($id);
        
        //VALIDANDO PERMISOS DE ACCESO...
        if (PerfilesController::$permisos->borrar) {
            //VALIDANDO SI HAY USUARIOS CON EL PERFIL...
            $usuarios=User::where('perfil',$id)->get();
            if(count($usuarios)>0){
                $mensaje='No se puede eliminar el perfil ' . $perfil->nombre.' debido a que los siguientes usuarios están asignados a el:';
                foreach($usuarios AS $usuario){
                    $mensaje.='<br>     -  '.$usuario->username;
                }
                $mensaje.='<br>Cambia el perfil de los usuarios mencionados o inactiva este perfil.';
                Session::flash('inborrable', $mensaje);
                return redirect()->back();
            }else{
                #BORRANDO LOS PERMISOS DEL PERFIL...
                Permisos::where('perfil', $id)->delete();
                $perfil->delete();
                Session::flash('message', 'Se ha eliminado el perfil ' . $perfil->nombre);
            return redirect()->route('security.perfiles.index');
            }
        } else {
            return view('sinpermisos');
        }
    }

}
