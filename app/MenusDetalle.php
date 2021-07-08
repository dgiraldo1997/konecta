<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class MenusDetalle extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
        
	protected $table = 'menus_detalle';
	protected $fillable = ['codigo','nombre','menu','glyph','acceso','crear','editar','borrar'];
        
        public function getMenu(){
            return $this->belongsTo('App\Menus','menu','id');
        }
}
