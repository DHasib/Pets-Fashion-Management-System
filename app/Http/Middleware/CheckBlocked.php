<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\Auth;


class CheckBlocked
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
        if (auth()->check()) 
       {
            if (date('Y-m-d H:i:s') < auth()->user()->blocked_date) {  
                $blocked_days = now()->diffInDays(auth()->user()->blocked_date); 
                $message = 'Your account has been blocked. It will be unblocked after '.$blocked_days.' '.str_plural('day', $blocked_days) . ' --Note: 0 Days Mean 1 Days';
                auth()->logout();     
                return redirect('login')->withMessage($message);    
            }            
        }  
        return $next($request);
    }
}
