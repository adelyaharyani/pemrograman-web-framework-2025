<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RollCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        foreach($roles as $role){
            if(Auth:: check()&& Auth::user()->role == $role){
                return $next($request);
            }
            Auth::logout();
            return redirect()->route('login')->with('status', 'Halaman ini dibatasi');
        }

    }
}
