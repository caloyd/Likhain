<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\EmployeeAttendance;
use Session;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialFacebookAccountService;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $providers = [
        'github','facebook','google','twitter'
    ];


    public function __construct()
    {
        $this->middleware(['guest', 'preventbackhistory'])->except('logout');
    }

    public function showLoginForm()
    {
        return view('home');
    }

    protected function validateLogin(Request $request)
    {
        $result = User::withTrashed()->where('email', $request->email)->get();

        if ($result->isNotEmpty()) {
            if ($request->userType == 5) {
                if($result[0]->user_type_id !== 5) {
                    $this->incrementLoginAttempts($request);
                    return $this->sendFailedLoginResponse($request);
                }
            }
            if ($request->userType == 3 || $request->userTypeStaff == 4) {
                if($result[0]->user_type_id !== 3 && $result[0]->user_type_id !== 4) {
                    $this->incrementLoginAttempts($request);
                    return $this->sendFailedLoginResponse($request);
                }
            }

            if ($request->userType == 2 || $request->userTypeSuper == 1) {
                if($result[0]->user_type_id !== 2 && $result[0]->user_type_id !== 1) {
                    $this->incrementLoginAttempts($request);
                    return $this->sendFailedLoginResponse($request);
                }
            }
            
            if ($request->userType == 6) {
                if($result[0]->user_type_id !== 6) {
                    $this->incrementLoginAttempts($request);
                    return $this->sendFailedLoginResponse($request);
                }
            }

            if ($result[0]->trashed()) {
                $result[0]->restore();
            }
        }
    }

    function authenticated(Request $request, $user)
    {
        $user->timestamps = false;
        $user->last_login_at = now()->setTimezone('Asia/Singapore');
        $user->save();

        $id = Auth::user()->id;
        $idUserType = Auth::user()->user_type_id;
        if($idUserType == 6) {
            $employerId = User::find($id)->employee->employer_id;
            $employeeId = User::find($id)->employee->id;
            $time_in = new EmployeeAttendance;
            $time_in->clock_in =  now()->setTimezone('Asia/Singapore');
            $time_in->employee_id = $employeeId;
            $time_in->employer_id = $employerId;
            $time_in->save();
        }
    }
    public function show()
    {
        return view('auth.login');
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }    
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function facebookCallback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/applicant/dashboard/');
    }
}
