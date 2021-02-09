<?php


Route::get('/', 'HomeController@index')->name('home');

////////////////////////////////////////////////////////////////////////////////
////////////////          AUTH ROUTES             ////////////////////////
//////////////////////////////////////////////////////////////////////////////

Route::get('/login_employee', function () {
        return view('login_employee');
})->middleware(['guest','preventbackhistory']);

Route::get('/login_employer', function () {
        return view('login_employer');
})->middleware(['guest','preventbackhistory']);

Route::get('/login_admin', function () {
        return view('login_admin');
})->middleware(['guest','preventbackhistory']);

Route::get('/view-job-post', function () {
        return view('view-job-post');
});

Route::get('/searchJob', 'JobPostController@searchJob')->name('searchJob');

////////////////////////////////////////////////////////////////////////////////
////////////////          AUTH ROUTES             /////////////////////////////
//////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////          APPLICANT ROUTES             ////////////////////////
//////////////////////////////////////////////////////////////////////////////

Route::view('/applicant/edit-profile', 'applicant.edit-profile');
Route::view('/applicant/2fa', 'auth.2fa');
Route::view('/applicant/deactivate', 'applicant.deactivate');
Route::view('/applicant/view-job-post', 'applicant.view-job-post');


Route::prefix('applicant')->name('applicant.')->group(
    function () {
        Route::get('/register', 'Auth\RegisterController@showApplicantSignUp')->name('signup');
        Route::get('/dashboard', 'ApplicantController@showApplicantDashboard')->name('dashboard');
        Route::resource('/profile', 'ApplicantController', ['except' => ['create', 'destroy', 'edit']]);
        Route::delete('/remove_education/{id}', 'ApplicantController@removeApplicantEducation');
        Route::put('/remove_salary/{id}', 'ApplicantController@removeApplicantSalary');
        Route::delete('/remove_work_experience/{id}', 'ApplicantController@removeApplicantWorkExperience');
        Route::get('/applicant/messageBox', 'ApplicantController@messagebBox')->name('messageBox');
        Route::get('/change-password', 'ApplicantController@showChangePasswordForm')->name('changepassword');
        Route::post('/change-password/{id}', 'ApplicantController@changePassword')->name('update.password');
        Route::get('/deactivate-account', 'ApplicantController@showDeactivateAccountForm')->name('deactivate');
        Route::post('/deactivate-account/{id}', 'ApplicantController@deactivateAccount')->name('deactivate.account');
        Route::get('/view-job-post/{id}', 'ApplicantController@viewJobDetailsApplicant');
        Route::get('/submit-job-application/{id}', 'ApplicantController@submitJobApplication');
        Route::get('/job-applications', 'ApplicantController@jobApplications');
        Route::delete('/delete-job-app/{id}', 'ApplicantController@deleteJobApplications');
        Route::get('/interview', 'ApplicantController@interviewInvite');
        Route::get('/interviews', 'ApplicantController@updateView');
        Route::get('/job-offers', 'ApplicantController@jobOffer');
        Route::delete('/delete-job-offer/{id}', 'ApplicantController@deleteJobOffer');
        Route::get('/company-job-offer/{id}', 'ApplicantController@viewJobOffer');
        Route::get('/company-details/{id}', 'ApplicantController@companyDetailsApplicant');
        Route::post('/add-feedback/{id}', 'ApplicantController@addFeedback')->name('add.feedback');
        Route::post('/logout', 'ApplicantController@logout')->name('logout.applicant');
    }
);

Route::post('/save-job-applied', 'ApplicantController@applyJobSave');
Route::patch('/decision-accept/{id}', 'ApplicantController@updateDecisionJobOfferAccept');
Route::patch('/decision-decline/{id}', 'ApplicantController@updateDecisionJobOfferDecline');
Route::patch('/resume-upload/{id}', 'ApplicantController@uploadResume');
Route::patch('/upload-profile-picture-applicant/{id}', 'ApplicantController@uploadProfilePicture');
Route::patch('/default-picture-applicant/{id}', 'ApplicantController@removeProfilePicture');
Route::patch('/applicant-interview-decision-accept/{id}', 'ApplicantController@interviewDecisionAccept');
Route::patch('/applicant-interview-decision-decline/{id}', 'ApplicantController@interviewDecisionDecline');
Route::patch('/applicant-interview-reschedule/{id}', 'ApplicantController@interviewDecisionReschedule');
Route::delete('multipleDeleteApplication', 'ApplicantController@multipleDeleteApplication');
Route::delete('multipleDeleteJobOffer', 'ApplicantController@multipleDeleteJobOffer');

Route::post('/add-save-job', 'JobPostController@createSaveJobPost');
Route::post('/add-save-job-post', 'JobPostController@addSaveJobPost');
Route::get('/applicant/saved-jobs', 'JobPostController@saveJobPost');
Route::delete('/applicant/delete-save-job/{id}', 'JobPostController@removeSaveJob');
Route::post('/applicant/dashboard/', 'ApplicantController@jobSort');

Route::get('/search', 'ApplicantController@search');
Route::get('/advance-search', 'ApplicantController@advanceSearch');

Route::get('/applicant/video-call-interview/{applicant_id}/{first_name}{last_name}', 'ApplicantController@videocall');


Route::get('/company-details/{id}', 'JobPostController@companyDetails');
/////////////////////////////////////
// end APPLICANT ROUTES ////////////
///////////////////////////////////



/////////////////////////////////
// EMPLOYER DASHBOARD ROUTES ///
///////////////////////////////

Route::view('/employer/add-job-post', 'employer.add-job-post');
Route::view('/employer/view-applicants', 'employer.view-applicants');
Route::view('/employer/video-call-interview', 'employer.video-call-interview');
Route::view('/employer/profile', 'employer.profile');
Route::view('/employer/two-factor-authentication', 'employer.two-factor-authentication');
Route::view('/employer/deactivate', 'employer.deactivate');
Route::view('/employee/two-factor-authentication', 'employee.two-factor-authentication');

Route::post('/employer/deactivate/{id}', 'EmployerController@deactivateAccount');

Route::prefix('employer')->name('employer.')->group(
    function () {
        Route::get('/register', 'Auth\RegisterController@showEmployerSignUp')->name('signup');
        Route::get('/dashboard', 'EmployerController@index')->name('dashboard');
        Route::get('/profile', 'EmployerController@profile');
        Route::patch('/update-interview/{id}', 'EmployerController@updateInterview');
        Route::post('/logout', 'EmployerController@logout')->name('logout.employer');
    }
);

Route::get('/employer/job-post', 'JobPostController@displayJobPost');
Route::get('/job-post', 'JobPostController@viewJobPost');
Route::get('/view-job-post/{id}', 'JobPostController@viewJobPostDetails');
Route::post('/save-add-job-post', 'JobPostController@createJobPost');
Route::get('employer/view-applicants/{id}', 'JobPostController@viewApplicants');
Route::delete('/delete-job-post/{id}', 'JobPostController@deleteJobPost');
Route::delete('/delete-applicant/{id}', 'JobPostController@deleteApplicant');
Route::delete('multiDeleteJobPost', 'JobPostController@deleteAll');

Route::get('/employer/company-details', 'CompanyController@companyDetails');
Route::patch('/company-update/{id}', 'CompanyController@updateCompanyDetails');

Route::get('employer/applicant-search', 'EmployerController@applicantSearch');
Route::post('/set-interview', 'EmployerController@setInterview');

Route::get('employer/applicant-interview', 'EmployerController@applicantInterview');
Route::post('/set-job-offer', 'EmployerController@setJobOffer');
Route::get('/employer/change-password', 'EmployerController@showChangePasswordFormEmployer');
Route::get('/employer/job-offers', 'EmployerController@viewJobOffers');
Route::delete('/delete-job-offer-emp/{id}', 'EmployerController@deleteJobOffersEmployer');
Route::patch('/profile-update/{id}', 'EmployerController@profilePost');

Route::patch('/upload-profile-picture-employer/{id}', 'EmployerController@uploadProfilePicture');
Route::patch('/default-picture-employer/{id}', 'EmployerController@removeProfilePicture');

Route::post('/change-password-employer/{id}', 'EmployerController@changePasswordEmployer');
Route::get('/employer/company-verification', 'CompanyDocumentController@viewDocument');
Route::post('/add-doc', 'CompanyDocumentController@addDocument');
Route::get('/employer/applicant-feedback', 'EmployerController@viewApplicantFeedback');
Route::patch('/feedback-approve/{id}', 'EmployerController@approveFeedback');
Route::patch('/feedback-reject/{id}', 'EmployerController@rejectFeedback');
Route::get('/employer/employer-staff', 'EmployerController@addEmployerStaffView');
Route::post('/add-employer', 'EmployerController@addEmployerStaff');
Route::delete('/delete-employer-staff/{id}', 'EmployerController@deleteEmployerStaff');
Route::delete('multiDeleteInterview', 'EmployerController@multiDeleteInterview');
Route::delete('multiDeleteJobOffer', 'EmployerController@multiDeleteJobOffer');
Route::delete('multiDeleteStaff', 'EmployerController@multiDeleteStaff');
Route::patch('multiUpdateInterview', 'EmployerController@multiUpdateInterview');

Route::get('/employer/employee-list', 'EmployerController@viewEmployee');
Route::post('/add-employee', 'EmployerController@addEmployee');
Route::delete('/delete-employee/{id}', 'EmployerController@deleteEmployee');
Route::delete('multiDeleteEmployee', 'EmployerController@multiDeleteEmployee');
Route::get('/employer/leave-request', 'EmployerController@employeeLeaveView');
Route::patch('/leave-approve/{id}', 'EmployerController@approveLeave');
Route::patch('/leave-deny/{id}', 'EmployerController@denyLeave');
Route::patch('multipleApproveLeave', 'EmployerController@multipleApproveLeave');
Route::patch('multipleDenyLeave', 'EmployerController@multipleDenyLeave');

Route::get('/employer/video-call-interview/{applicant_id}/{first_name}{last_name}', 'EmployerController@videocall');

Route::view('/employer/videocallframe', 'include.video-call');
/////////////////////////////////////
// end EMPLOYER DASHBOARD ROUTES ///
///////////////////////////////////



/////////////////////////////////////
//// EMPLOYEE ROUTES ///////////////
///////////////////////////////////

Route::prefix('employee')->name('employee.')->group(
    function () {
        Route::get('/dashboard', 'EmployeeController@viewDashboard')->name('dashboard');
        Route::patch('/dashboard/{id}', 'EmployeeController@clockOut')->name('time.out');
        Route::get('/attendance', 'EmployeeController@viewAttendance');
        Route::get('/salary', 'EmployeeController@viewSalary');
        Route::get('/leave-request', 'EmployeeController@viewLeaveRequest');
        Route::post('/leave-request', 'EmployeeController@addLeaveRequest')->name('add.leave');
        Route::patch('/leave-request/{id}', 'EmployeeController@editLeaveRequest')->name('edit.leave');
        Route::delete('/leave-request/{id}', 'EmployeeController@deleteLeave')->name('delete.leave');
        Route::get('/profile', 'EmployeeController@viewProfile');
        Route::patch('/profile/{id}', 'EmployeeController@updateEmployeeProfile')->name('update.profile');
        Route::get('/change-password-employee', 'EmployeeController@showChangePasswordForm');
        Route::post('/change-password-employee/{id}', 'EmployeeController@changePasswordEmployee')->name('update.password');
        Route::post('/logout', 'EmployeeController@logout')->name('logout.employee');
    }
);
Route::delete('multipleDeleteLeave', 'EmployeeController@multipleDeleteLeave');

Route::patch('/upload-profile-picture/{id}', 'EmployeeController@uploadProfilePicture');
Route::patch('/default-picture/{id}', 'EmployeeController@removeProfilePicture');


/////////////////////////////////////
// end EMPLOYEE ROUTES /////////////
///////////////////////////////////


/////////////////////////////////
// ADMIN ROUTES ////////////////
///////////////////////////////

Route::view('/admin/view-company-details', 'admin.view-company-details');
Route::view('/admin/two-factor-authentication', 'admin.two-factor-authentication');

Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::get('/dashboard', 'AdminController@showAdminDashboard')->name('dashboard');
        Route::get('/employer-requirements', 'AdminController@viewEmployerRequirements');
        Route::post('/add-employer-requirements', 'AdminController@addEmployerRequirements')->name('add.requirements');
        Route::delete('/delete-employer-requirements/{id}', 'AdminController@deleteEmployerRequirements')->name('delete.requirements');
        Route::get('/employer-verification', 'AdminController@employerVerification');
        Route::get('/view-employer-verification/{id}', 'AdminController@viewEmployerVerification');
        Route::get('/profile', 'AdminController@viewProfile');
        Route::patch('/profile/{id}', 'AdminController@editProfile')->name('update.profile');
        Route::get('/change-password-admin', 'AdminController@showChangePasswordForm');
        Route::post('/change-password-admin/{id}', 'AdminController@changePasswordAdmin')->name('update.password');
        Route::get('/admin-list', 'AdminController@viewAdminList');
        Route::post('/admin-list', 'AdminController@addAdmin')->name('add.admin');
        Route::delete('/admin-list/{id}', 'AdminController@deleteAdmin')->name('delete.admin');
        Route::post('/logout', 'AdminController@logout')->name('logout.admin');
    }
);


Route::patch('/approve-document/{id}', 'AdminController@acceptDocument');
Route::patch('/reject-document/{id}', 'AdminController@rejectDocument');
Route::patch('/verify-employer/{id}', 'AdminController@verifyEmployer');
Route::patch('/upload-profile-picture-admin/{id}', 'AdminController@uploadProfilePicture');
Route::patch('/default-picture-admin/{id}', 'AdminController@removeProfilePicture');

Route::patch('/approve-document/{id}', 'AdminController@acceptDocument');
Route::patch('/reject-document/{id}', 'AdminController@rejectDocument');
Route::patch('/verify-employer/{id}', 'AdminController@verifyEmployer');
Route::patch('/upload-profile-picture-admin/{id}', 'AdminController@uploadProfilePicture');
Route::patch('/default-picture-admin/{id}', 'AdminController@removeProfilePicture');

Route::delete('/multipleDeleteEmployerRequirement', 'AdminController@multipleDeleteEmployerRequirement');


//////////////////////////////////
// end ADMIN ROUTES /////////////
////////////////////////////////


// 2FA Routes
Route::get('/applicant/2fa', 'PasswordSecurityController@show2faForm');
Route::post('/generate2faSecret', 'PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
Route::post('/applicant/2fa', 'PasswordSecurityController@enable2fa')->name('enable2fa');
Route::post('/disable2fa', 'PasswordSecurityController@disable2fa')->name('disable2fa');
Route::post('/2faVerify', function () {
        return redirect(request()->session()->get('_previous')['url']);
})->name('2faVerify')->middleware('2fa');

// Socialite routes
// Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
// Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/oauth/redirect', 'Auth\LoginController@facebookRedirect');
Route::get('/callback', 'Auth\LoginController@facebookCallback');

Auth::routes();

////Forgot password routes
Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AccountsController@resetPassword');


// THIS IS FOR PRODUCTION MODE //
if (env('APP_ENV') === 'Production') {
    URL::forceScheme('https');
}
