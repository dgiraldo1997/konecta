<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Clientes extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,CanResetPassword;

    protected $table = 'clientes';
    protected $fillable = ['id', 'documento', 'name', 'telefono', 'direccion', 'activo', 'created_at', 'updated_at'];


    //SCOPES DE BUSQUEDA...
    public static function filtrarYPaginar($documento,$name,$telefono,$direccion,$activo) {
        return Clientes::documento($documento)
                        ->name($name)
                        ->telefono($telefono)
                        ->direccion($direccion)
                        ->activo($activo)
                        ->orderBy('name')
                        ->paginate();
    }

    public function scopeDocumento($query, $documento) {
        if (trim($documento) <> '') {
            $query->where('documento', $documento);
        }
    }

    public function scopeName($query, $name) {
        if (trim($name) <> '') {
            $query->where('name','LIKE', '%'.$name.'%');
        }
    }

    public function scopeTelefono($query, $telefono) {
        if (trim($telefono) <> '') {
            $query->where('telefono', $telefono);
        }
    }


    public function scopeDireccion($query, $direccion) {
        if (trim($direccion) <> '') {
            $query->where('direccion', $direccion);
        }
    }

    public function scopeActivo($query, $activo) {
        if (trim($activo) <> '') {
            $query->where('activo',$activo);
        }
    }

}
