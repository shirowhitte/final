<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Driver
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        error_log('Some message here.');
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'DRIVER') {
            return $next($request);
        }
        else {
            return redirect()->route('401');
        }
    }
}
