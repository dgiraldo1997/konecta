<?php

namespace App\Http\Controllers\Ayuda;

use App\Http\Controllers\Controller;
use App\Permisos;
use Auth;

class AcercaDeController extends Controller {

    public static $permisos;
    public static $menu = 'ACE';

    public function __construct() {
        $this->middleware('auth');
        if (Auth::check()) {
            AcercaDeController::$permisos = Permisos::where('perfil', Auth::user()->perfil)
                    ->where('menu', AcercaDeController::$menu)
                    ->first();
            $this->middleware('permisos:' . AcercaDeController::$permisos->acceso);
        }
    }

    public function index() {
        return view('ayuda.acercade.index');
    }

}
