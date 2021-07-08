<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Permisos extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
        
	protected $table = 'permisos';
	protected $fillable = ['perfil','menu','acceso','crear','editar','borrar'];
        
        public function getPerfil(){
            return $this->belongsTo('App\Perfiles','perfil','id');
        }
        
        public function getMenu(){
            return $this->belongsTo('App\MenusDetalle','menu','id');
        }
}
