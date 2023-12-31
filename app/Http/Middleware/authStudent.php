<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class authStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role === 'student' || auth()->user()->role === 'admin' || auth()->user()->role === 'professor'){
        return $next($request);
        }

        return redirect('/courses')->with('message', 'Unauthorized access.');
    }
}
