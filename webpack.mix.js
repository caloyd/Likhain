const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin/admin_list.js', 'public/js/admin')
    .js('resources/js/admin/change_password.js', 'public/js/admin')
    .js('resources/js/admin/dashboard.js', 'public/js/admin')
    .js('resources/js/admin/employer_requirement.js', 'public/js/admin')
    .js('resources/js/admin/employer_verification.js', 'public/js/admin')
    .js('resources/js/admin/profile.js', 'public/js/admin')
    .js('resources/js/admin/view_employer_verification.js', 'public/js/admin')
    .js('resources/js/applicant/change_password.js', 'public/js/applicant')
    .js('resources/js/applicant/company_detail.js', 'public/js/applicant')
    .js('resources/js/applicant/company_job_offer.js', 'public/js/applicant')
    .js('resources/js/applicant/dashboard.js', 'public/js/applicant')
    .js('resources/js/applicant/interview.js', 'public/js/applicant')
    .js('resources/js/applicant/job_application.js', 'public/js/applicant')
    .js('resources/js/applicant/job_offer.js', 'public/js/applicant')
    .js('resources/js/applicant/profile.js', 'public/js/applicant')
    .js('resources/js/applicant/saved_job.js', 'public/js/applicant')
    .js('resources/js/applicant/view_job_post.js', 'public/js/applicant')
    .js('resources/js/employee/attendance.js', 'public/js/employee')
    .js('resources/js/employee/change_password.js', 'public/js/employee')
    .js('resources/js/employee/dashboard.js', 'public/js/employee')
    .js('resources/js/employee/leave_request.js', 'public/js/employee')
    .js('resources/js/employee/profile.js', 'public/js/employee')
    .js('resources/js/employee/salary.js', 'public/js/employee')
    .js('resources/js/employer/add_job_post.js', 'public/js/employer')
    .js('resources/js/employer/applicant_feedback.js', 'public/js/employer')
    .js('resources/js/employer/applicant_interview.js', 'public/js/employer')
    .js('resources/js/employer/applicant_search.js', 'public/js/employer')
    .js('resources/js/employer/change_password.js', 'public/js/employer')
    .js('resources/js/employer/company_detail.js', 'public/js/employer')
    .js('resources/js/employer/company_verification.js', 'public/js/employer')
    .js('resources/js/employer/dashboard.js', 'public/js/employer')
    .js('resources/js/employer/deactivate.js', 'public/js/employer')
    .js('resources/js/employer/employee_list.js', 'public/js/employer')
    .js('resources/js/employer/employer_staff.js', 'public/js/employer')
    .js('resources/js/employer/job_offer.js', 'public/js/employer')
    .js('resources/js/employer/job_post.js', 'public/js/employer')
    .js('resources/js/employer/leave_request.js', 'public/js/employer')
    .js('resources/js/employer/profile.js', 'public/js/employer')
    .js('resources/js/employer/view_applicant.js', 'public/js/employer')
    .js('resources/js/landing/job_post.js', 'public/js/landing')
    .js('resources/js/landing/landing_page.js', 'public/js/landing')
    .js('resources/js/landing/number_format.js', 'public/js/landing')
    .sass('resources/sass/app.scss', 'public/css');
