<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::user() && Auth::user()->role ==1)
        {
                return $next($request);
        }
        
        Session::flash('info', 'You do not have Permissions to perform this Action');
        return redirect('login');
    }
}
