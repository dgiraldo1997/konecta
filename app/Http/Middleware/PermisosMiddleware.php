<?php namespace App\Http\Middleware;

use Closure;

class PermisosMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next,$permiso)
	{
            if($permiso){
		return $next($request);
            }else{
                return view('sinpermisos');
            }
	}

}
