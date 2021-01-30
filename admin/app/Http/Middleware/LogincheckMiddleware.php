<?php

namespace App\Http\Middleware;

use Closure;

class LogincheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->session()->all();
        if($request->session()->has('user')){
            return $next($request);
        }else{
            return redirect('login');
        }



    }
}
