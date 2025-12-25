<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!auth()->check()) {

            if($request->ajax()){
               return response()->json([
                'Your session expired'
               ],401); 
            }
            
            return redirect()->route('login')->with('message', 'Your session expired');
        }
        return $next($request);
    }
}
