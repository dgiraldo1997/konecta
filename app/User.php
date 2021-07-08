<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';
    protected $fillable = ['username', 'documento', 'name', 'telefono', 'direccion', 'perfil', 'activo', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];


    public function setPasswordAttribute($value) {
        //SOLO SE MODIFICA LA CONTRASEÑA SI NO ESTA VACIA...
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function getPerfil() {
        return $this->belongsTo('App\Perfiles', 'perfil', 'id');
    }
    //SCOPES DE BUSQUEDA...
    public static function filtrarYPaginar($documento,$name,$telefono,$direccion,$activo) {
        return User::documento($documento)
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
