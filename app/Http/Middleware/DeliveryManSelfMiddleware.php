<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DeliveryManSelfMiddleware
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

        if(session()->has('delivery_login')&& session()->has('delivery_email')&& session()->has('delivery_email')){

        }else{
            return redirect()->route('deliveryman.index')->with('message','Please Login');
        }
        return $next($request);
    }
}
