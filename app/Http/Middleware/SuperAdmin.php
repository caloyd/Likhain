<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdmin
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
        if (Auth::check() && Auth::user()->user_type_id == 1 || Auth::check() && Auth::user()->user_type_id == 2) {
            return redirect()->route('admin.dashboard');
        }
        // elseif (Auth::check() && Auth::user()->user_type_id == 2) {
        //     return redirect()->route('admin.dashboard');
        // }
        elseif (Auth::check() && Auth::user()->user_type_id == 3) {
            return redirect()->route('employeradmin.dashboard');
        }
        elseif (Auth::check() && Auth::user()->user_type_id == 4) {
            return redirect()->route('employerstaff.dashboard');
        }
        elseif (Auth::check() && Auth::user()->user_type_id == 5) {
            return redirect()->route('applicant.dashboard');
        }
        else {
            return redirect()->route('home');
        }
    }
}
