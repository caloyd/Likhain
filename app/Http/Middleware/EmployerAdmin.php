<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EmployerAdmin
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
        if (Auth::check() && Auth::user()->user_type_id == 1) {
            return redirect()->route('superadmin.dashboard');
        }
        elseif (Auth::check() && Auth::user()->user_type_id == 2) {
            return redirect()->route('admin.dashboard');
        }
        elseif (Auth::check() && Auth::user()->user_type_id == 3 || Auth::check() && Auth::user()->user_type_id == 4) {
            return $next($request); 
        }
        // elseif (Auth::check() && Auth::user()->user_type_id == 4) {
        //     return redirect()->route('employer.dashboard');
        // }
        elseif (Auth::check() && Auth::user()->user_type_id == 5) {
            return redirect()->route('applicant.dashboard');
        }
        else {
            return redirect()->route('home');
        }
    }
}
