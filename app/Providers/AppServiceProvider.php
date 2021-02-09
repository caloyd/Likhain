<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\User;
use App\JobOffer;
use App\Applicant;
use App\Interview;
use App\CompanySubmitDoc;
use App\EmployeeLeave;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('applicant.include.navbar', function($view)
        {
            $id = Auth::id();
            $app = User::find($id)->applicant->id;
            $job_offer = JobOffer::where('applicant_id','=',$app)
            ->where('views','=',"")
            ->count();
            $view->with('joboffer',$job_offer);
        });

        view()->composer('applicant.include.navbar', function($view)
        {
            $id = Auth::id();
            $app = User::find($id)->applicant->id;
            $interview = Interview::where('applicant_id','=',$app)
            ->where('views','=',"")
            ->count();
            $view->with('interview',$interview);
        });

        view()->composer('employer.include.navbar', function($view)
        {
            $id = Auth::id();
            $app = User::find($id)->employer->id;
            $interview_app = Interview::where('employer_id','=',$app)
            ->where('interview_applicant_decision','!=',null)
            ->count();
            $view->with('interview_app',$interview_app);
        });

        view()->composer('employer.include.navbar', function($view)
        {
            $app_count = Applicant::where('expected_salary','!=',null)
            ->count();
            $view->with('app_count',$app_count);
        });

        view()->composer('employer.include.navbar', function($view)
        {
            $id = Auth::id();
            $app = User::find($id)->employer->id;
            $job_offer_count = JobOffer::where('applicant_decision','!=',null)
            ->where('employer_id','=',$app)
            // ->where('view','=',"0")
            ->count();
            $view->with('job_offer_count',$job_offer_count);
        });

        view()->composer('admin.include.navbar', function($view)
        {
            //$id = Auth::id();
            $verify = CompanySubmitDoc::where('status','Uploaded')
            ->count();
            $view->with('verify',$verify);
        });

        view()->composer('employee.include.navbar', function($view)
        {
            $id = Auth::id();
            $employeeId = User::find($id)->employee->id;
            $leave = EmployeeLeave::where('employer_decision', '!=',null)
            ->where('employee_id',$employeeId)
            ->count();
            $view->with('leave',$leave);
        });

    }
}
