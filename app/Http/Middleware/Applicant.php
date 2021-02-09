<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Applicant
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
        elseif (Auth::check() && Auth::user()->user_type_id == 3) {
            return redirect()->route('employeradmin.dashboard');
        }
        elseif (Auth::check() && Auth::user()->user_type_id == 4) {
            return redirect()->route('employer.dashboard');
        }
        elseif (Auth::check() && Auth::user()->user_type_id == 5) {
            return $next($request); 
        }
        else {
            return redirect()->route('home');
        }
    }
    
    public function currency()
    {   
        return $this->belongsTo('App\Currency');  
    }
}
