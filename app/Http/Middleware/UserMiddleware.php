<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::getUser()->roles()->pluck('name')[0] == 'user') {
            return $next($request);
        }else{
            Auth::logout();
            return redirect('login');
        }
    }
}
