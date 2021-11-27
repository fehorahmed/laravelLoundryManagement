<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('admin_email') && session()->has('admin_name')){

            
            
            //view('adminlogin.index');
        }else{
            return redirect()->route('adminlogin.index');
        }

        return $next($request);
    }
}
