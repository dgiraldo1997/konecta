<?php

namespace App\Http\Controllers\Ayuda;

use App\Http\Controllers\Controller;
use App\Permisos;
use App\User;
use Auth;
use Illuminate\Http\Request;

class EnviarComentarioController extends Controller {

    public static $permisos;
    public static $menu = 'CMN';

    public function __construct() {
        $this->middleware('auth');
        if (Auth::check()) {
            EnviarComentarioController::$permisos = Permisos::where('perfil', Auth::user()->perfil)
                    ->where('menu', EnviarComentarioController::$menu)
                    ->first();
            $this->middleware('permisos:' . EnviarComentarioController::$permisos->acceso);
        }
    }

    public function index(Request $request) {
        
    }

    public function create() {
        if (EnviarComentarioController::$permisos->acceso) {
            $permisos = EnviarComentarioController::$permisos;
            return view('ayuda.enviarcomentario.create');
        } else {
            return view('sinpermisos');
        }
    }

    public function store(Request $request) {
        //dd($query);
        return view('ayuda.enviarcomentario.confirm');
    }

    public function show($id) {
        
    }

    public function edit() {
        
    }

    public function update($id) {
        
    }

    public function destroy($id) {
        
    }

}
