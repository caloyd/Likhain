<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Applicant;
use App\Company;
use App\Employer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $which_user;

    use RegistersUsers;

    protected function redirectTo(){
        if($this->which_user == 'employer')
        {
            return '/login_employer';
        }
        elseif($this->which_user == 'applicant')
        {
            return '/';
        }
        else
        {
            return '/';
        }
    }

    public function __construct()
    {
        $this->middleware(['guest', 'preventbackhistory']);
        $this->which_user = '';
    }

    public function showApplicantSignUp()
    {
        return view('signup-applicant');
    }

    public function showEmployerSignUp()
    {
        return view('signup-employer');
    }

    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        if($data['userType'] == 5){
            return Validator::make($data, [
                'firstName' => ['required', 'alpha', 'max:255'],
                'middleName' => ['alpha', 'max:255', 'nullable'],
                'lastName' => ['required', 'alpha', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'applicantPassword' => ['required', 'string', 'min:8', 'confirmed',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/'], // must contain a special character,],
            ]);
        }
        elseif($data['userType'] == 3) {
            return Validator::make($data, [
                'employerFirstname' => ['required', 'string', 'max:255'],
                'employerLastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/'], // must contain a special character,
                'companyEmail' => ['required','string'],
                'companyNumber' => ['required','string'],
                'companyName' => ['required','string'],
                'companyRegiNo' => ['required','string'],
            ]);
        }
        elseif($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     *
     * 
     */

    
    protected function create(array $data)
    {
        if($data['userType'] == 5){
            $result = User::create([
                'user_type_id' => $data['userType'],
                'first_name' => $data['firstName'],
                'middle_name' => $data['middleName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'password' => Hash::make($data['applicantPassword']),
            ]);
            Applicant::create([
                'user_id' => $result->id
            ]);
            $this->which_user = 'applicant';
        }
        elseif($data['userType'] == 3){
            $result_user = User::create([
                'first_name' => $data['employerFirstname'],
                'last_name' => $data['employerLastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'user_type_id' => $data['userType'],
            ]);
            $result_company = Company::create([
                'company_email' => $data['companyEmail'],
                'contact_number' => $data['companyNumber'],
                'company_name' => $data['companyName'],
                'registration_number' => $data['companyRegiNo'],
            ]);
            Employer::create([
                'user_id' => $result_user->id,
                'company_id' => $result_company->id,
            ]);
            $this->which_user = 'employer';
        }
        
    }
}
