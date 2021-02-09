<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\JobPost;
use App\Employer;
use App\JobApplication;
use App\SavedJob;
use App\Applicant;
use App\Interview;
use App\Company;
use App\Currency;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    // View job posts in guest page
    public function viewJobPost()
    {
        $job_post_all = DB::table('companies')
        ->join('employers', 'companies.id', '=', 'employers.company_id')
        ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
        ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path')
        ->inRandomOrder()
        ->get();
        
        return view('job-post', compact('job_post_all'));
    }

    // View job posts detail in guest page
    public function viewJobPostDetails($id)
    {
        $job_post_id = JobPost::find($id)->id;
        $job_post_detail = DB::table('companies')
        ->join('employers', 'companies.id', '=', 'employers.company_id')
        ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
        ->join('currencies', 'job_posts.currency_id', '=', 'currencies.id')
        ->select('companies.id AS company_id', 'companies.company_name', 'job_posts.title', 'job_posts.job_specialization', 'job_posts.salary_range_minimum', 'job_posts.salary_range_maximum', 'currencies.name', 'job_posts.education_level', 'job_posts.position_level', 'job_posts.employment_type', 'job_posts.skill', 'job_posts.job_location', 'job_posts.id', 'job_posts.description', 'job_posts.created_at', 'job_posts.years_experience', 'companies.company_logo_path')
        ->where('job_posts.id', $job_post_id)
        ->get();
        
        return view('view-job-post', compact('job_post_detail'));
    }

    // View job posts in Job Post Page - Employer
    public function displayJobPost()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;
        $comp = User::find($logged_id)->employer->company_id;
        $user = DB::table('users')
        ->join('employers', 'users.id', '=', 'employers.user_id')
        ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
        ->select('users.first_name', 'users.last_name', 'job_posts.title', 'job_posts.created_at', 'job_posts.id', 'job_posts.employment_type', 'job_posts.position_level', 'job_posts.job_specialization', 'job_posts.job_location', 'job_posts.salary_range_minimum', 'job_posts.salary_range_maximum', 'job_posts.education_level', 'job_posts.years_experience', 'job_posts.skill', 'job_posts.recruitment_period', 'job_posts.description')
        ->where('employers.company_id', $comp)
        ->get();

        $company = DB::table('companies')
        ->join('employers', 'companies.id', '=', 'employers.company_id')
        ->select('companies.*')
        ->where('employers.id', $emp)
        ->get();
        //dd($company);
        $count = JobApplication::count();

        return view('employer.job-post', compact('user', 'count', 'company'));
    }

    // View Applicants page - Employer
    public function viewApplicants($id)
    {
        $applicants = JobPost::find($id);
        //Find id in job_posts table
        $specific_applicant = JobPost::find($id)->id;
        $applicant_skills = Applicant::all();
        $applicant_work = Applicant::all();

        $user_applicant = DB::table('users')
        ->join('applicants','users.id','=','applicants.user_id')
        ->join('job_applications','applicants.id','=','job_applications.applicant_id')
        ->join('job_posts','job_applications.job_post_id','=','job_posts.id')
        ->join('applicant_education_backgrounds','applicants.id','=','applicant_education_backgrounds.applicant_id')
        ->leftJoin('applicant_work_experiences','applicants.id','=','applicant_work_experiences.applicant_id')
        ->select('users.first_name','users.last_name','users.email','applicants.contact_number','applicants.id AS app_id','applicants.expected_salary','applicant_education_backgrounds.school','applicant_education_backgrounds.date_from','applicant_education_backgrounds.date_to','applicant_education_backgrounds.course_degree','applicant_education_backgrounds.education_attainment','applicant_work_experiences.job_title','applicant_work_experiences.company_name','applicant_work_experiences.date_from AS date_begin','applicant_work_experiences.date_to AS date_end','applicant_work_experiences.previous_salary','job_applications.id AS job_app_id','job_applications.job_pitch','applicants.avatar_image_path')
        ->where('job_posts.id',$specific_applicant)
        ->groupBy('job_applications.applicant_id')
        ->get();

        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;

        $interview = DB::table('users')
        ->join('applicants', 'applicants.user_id', '=', 'users.id')
        ->join('interviews', 'applicants.id', '=', 'interviews.applicant_id')
        ->select('interviews.interview_date', 'interviews.start_time', 'users.first_name', 'users.last_name')
        ->where('interviews.employer_id', $emp)
        ->get();

        return view('employer.view-applicants', compact('applicants','user_applicant','applicant_skills','interview','applicant_work'));
    }

    // remove applicant in view applicants page - Employer
    public function deleteApplicant($id)
    {
        //dd($id);
        $job_post_applicant_delete = JobApplication::find($id);
        $job_post_applicant_delete->delete();
        return redirect('employer/job-post');
    }

    // remove job post - Employer
    public function deleteJobPost($id)
    {
        //dd($id);
        $job_post_delete = JobPost::find($id);
        $job_post_delete->delete();
        return redirect('employer/job-post');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("job_posts")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Job Post/s Deleted successfully."]);
    }

    // job post ADD process - Employer
    public function createJobPost(Request $request)
    {
        $rules = array(
            "jobDescription" => "required",
            "positionTitle" => "required",
            "outputSkill" => "required",
            "minimumSalary" => "required|lt:maximumSalary|min:1",
            "maximumSalary" => "required",
            "skills" => "required"
        );

        //$this->validate($request, $rules);
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->messages()]);
        }

        $employer_id = Auth::user()->id;
        $employer_data = User::find($employer_id)->employer;
        $new_job_post = new JobPost;

        $new_job_post->employer_id = $employer_data->id;
        $new_job_post->currency_id = $request->currencyId;
        $new_job_post->description = $request->jobDescription;
        $new_job_post->title = $request->positionTitle;
        $new_job_post->employment_type = $request->employmentType;
        $new_job_post->position_level = $request->positionLevel;
        $new_job_post->job_specialization = $request->jobSpecialization;
        $new_job_post->salary_range_minimum = $request->minimumSalary;
        $new_job_post->salary_range_maximum = $request->maximumSalary;
        $new_job_post->education_level = $request->educLevel;
        $new_job_post->years_experience = $request->yrsExp;
        $new_job_post->skill = $request->outputSkill;
        $new_job_post->recruitment_period = $request->recPeriod;
        $new_job_post->job_location = $request->fullLocation;

        $new_job_post->save();

        //return redirect('employer/job-post');
        return response()->json(['success'  => 'Job post added successfully!']);
    }

    //ADD save job post - Applicant
    public function createSaveJobPost(Request $request)
    {
        $applicant_data = User::find(Auth::id())->applicant;
        $save_applicant = SavedJob::where('applicant_id', $applicant_data->id)
                                    ->where('job_post_id', $request->post_id)
                                    ->first();
        if ($save_applicant) {
            return response()->json(['saved'  => 'Job post already saved!']);
        } else {
            $save_job = new SavedJob;
            $save_job->job_post_id = $request->post_id;
            $save_job->applicant_id = $applicant_data->id;

            $save_job->save();
            return response()->json(['success'  => 'Job post saved successfully!']);
        }
    }

    public function addSaveJobPost(Request $request)
    {

        $applicant_data = User::find(Auth::id())->applicant;
        $save_applicant = SavedJob::where('applicant_id', $applicant_data->id)
                                    ->where('job_post_id', $request->post_id)
                                    ->first();
        if ($save_applicant) {
            return redirect()->back();
        } else {
            $save_job = new SavedJob;
            $save_job->job_post_id = $request->post_id;
            $save_job->applicant_id = $applicant_data->id;
            $save_job->save();
            return redirect()->back();
        }
    }

    //VIEW save job post - Applicant
    public function saveJobPost()
    {
        //show by applicant_id
        $logged_id = Auth::user()->id;
        $job_saved = User::find($logged_id)->applicant->id;
    
        $job = DB::table('companies')
        ->join('employers', 'companies.id', '=', 'employers.company_id')
        ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
        ->join('currencies', 'job_posts.currency_id', '=', 'currencies.id')
        ->join('saved_jobs', 'job_posts.id', '=', 'saved_jobs.job_post_id')
        ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.salary_range_minimum', 'job_posts.salary_range_maximum', 'job_posts.job_location', 'saved_jobs.created_at', 'job_posts.description', 'saved_jobs.id AS save_job_id', 'currencies.name AS currency_name', 'job_posts.id AS job_post_id', 'companies.company_logo_path')
        ->where('saved_jobs.applicant_id', $job_saved)
        ->get();

        return view('applicant.saved-jobs', compact('job'));
    }

    //  REMOVE save job - Applicant
    public function removeSaveJob($id)
    {
        //dd($id);
        $save_job_delete = SavedJob::find($id);
        $save_job_delete->delete();
        return redirect('applicant/saved-jobs');
    }

    public function searchJob(Request $request)
    {
        $search = $request->get('what');
        $searchLocation = $request->get('where');
        
        if ($request->get('what')) {
            $job_post_all = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path')
            ->where('job_posts.title', 'like', '%'.$search.'%')
            ->orWhere('companies.company_name', 'like', '%'.$search.'%')
            ->orWhere('job_posts.description', 'like', '%'.$search.'%')
            ->orWhere('job_posts.skill', 'like', '%'.$search.'%')
            ->get();
        } else {
            $job_post_all = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path')
            ->where('job_posts.job_location', 'like', '%'.$searchLocation.'%')
            ->get();
        }

        return view('job-post', compact('job_post_all'));
    }

    public function companyDetails($id)
    {
        $company  = Company::find($id);
        $company_id  = Company::find($id)->id;

        $company_job = DB::table('job_posts')
        ->join('employers', 'job_posts.employer_id', '=', 'employers.id')
        ->join('companies', 'employers.company_id', '=', 'companies.id')
        ->select('job_posts.title', 'job_posts.salary_range_minimum', 'job_posts.salary_range_maximum', 'companies.company_name', 'job_posts.job_location', 'job_posts.description', 'job_posts.created_at', 'job_posts.id', 'companies.company_logo_path')
        ->where('companies.id', $company_id)
        ->simplePaginate(3);

        return view('main_landing.company-details', compact('company', 'company_job'));
    }
}
