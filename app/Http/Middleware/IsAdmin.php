<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        if(!auth()->check()|| auth()->user()->level !== 'administrator'){
            abort(403);
        }
        // if (auth()->user()->level == $level){
            return $next($request);
        // }
        // return response()->json(['Halaman Ini Tidak Ada']);
       
    }
}
