<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;

use Closure;

class SoloAdmin
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->rol != 'Administrador') {
            if($request->ajax()){
                return response('No autorizado', 401);
            }else {
                return redirect()->to('home');
            }
        }
        return $next($request);
    }
}
