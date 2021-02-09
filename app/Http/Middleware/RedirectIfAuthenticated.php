<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                return redirect()->route('admin.dashboard');
            }
            // elseif (Auth::user()->user_type_id == 2) {
            //     return redirect()->route('admin.dashboard');
            // }
            elseif (Auth::user()->user_type_id == 3 || Auth::user()->user_type_id == 4) {
                return redirect()->route('employer.dashboard');
            }
            // elseif (Auth::user()->user_type_id == 4) {
            //     return redirect()->route('employer.dashboard');
            // }
            elseif (Auth::user()->user_type_id == 5) {
                return redirect()->route('applicant.dashboard');
            }
            elseif (Auth::user()->user_type_id == 6) {
                return redirect()->route('employee.dashboard');
            }
        }

        return $next($request);
    }
}
