<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(in_array($request->user()->role,$role))
        {
            return $next($request);
        }
        return redirect('/');

        // if(Auth::user()->role == 'Admin')
        // {
        //     return $next($request);
        // }
        // else{
        //     return redirect('/masuk');
        // }

    }
}
