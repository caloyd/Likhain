<?php

use Illuminate\Database\Seeder;
use App\Interview;

class InterviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interview::truncate();
        Interview::create([
            'applicant_id'              =>      1,
            'employer_id'               =>      3,
            'job_post_id'               =>      3,
            'interview_date'            =>      '01/23/2020',
            'start_time'                =>      '08:00 AM',
            'interview_address'         =>      'RBC 11th floor, Ortigas, Pasig City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Shinobu Kanae',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      3,
            'employer_id'               =>      3,
            'job_post_id'               =>      3,
            'interview_date'            =>      '01/25/2020',
            'start_time'                =>      '01:00 PM',
            'interview_address'         =>      'E-COM Bldg, 25th floor, Pasay City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Kamado Tanjirou',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      2,
            'employer_id'               =>      2,
            'job_post_id'               =>      3,
            'interview_date'            =>      '01/24/2020',
            'start_time'                =>      '08:00 AM',
            'interview_address'         =>      'RBC 11th floor, Ortigas, Pasig City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Maricar Garcia',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      3,
            'employer_id'               =>      2,
            'job_post_id'               =>      4,
            'interview_date'            =>      '01/24/2020',
            'start_time'                =>      '09:00 AM',
            'interview_address'         =>      'RBC 11th floor, Ortigas, Pasig City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Kip Conner',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      1,
            'employer_id'               =>      2,
            'job_post_id'               =>      9,
            'interview_date'            =>      '01/27/2020',
            'start_time'                =>      '09:00 AM',
            'interview_address'         =>      'RBC 11th floor, Ortigas, Pasig City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Kip Conner',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      1,
            'employer_id'               =>      2,
            'job_post_id'               =>      4,
            'interview_date'            =>      '01/31/2020',
            'start_time'                =>      '11:00 AM',
            'interview_address'         =>      'RBC 11th floor, Ortigas, Pasig City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Melinda de Guzman',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      3,
            'employer_id'               =>      1,
            'job_post_id'               =>      1,
            'interview_date'            =>      '03/20/2020',
            'start_time'                =>      '7:00 PM',
            'interview_address'         =>      'Cityland 10 Tower II, Valero St. Makati City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Melinda de Guzman',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      2,
            'employer_id'               =>      1,
            'job_post_id'               =>      1,
            'interview_date'            =>      '03/20/2020',
            'start_time'                =>      '5:00 PM',
            'interview_address'         =>      'Cityland 10 Tower II, Valero St. Makati City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Melinda de Guzman',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);

        Interview::create([
            'applicant_id'              =>      1,
            'employer_id'               =>      1,
            'job_post_id'               =>      1,
            'interview_date'            =>      '03/20/2020',
            'start_time'                =>      '3:00 PM',
            'interview_address'         =>      'Cityland 10 Tower II, Valero St. Makati City',
            'recruiter_contact'         =>      '09885142344',
            'recruiter_name'            =>      'Melinda de Guzman',
            'interview_notes'           =>      'Bring 2 valid I.D\'s and your resume. Bring your portfolio if there\'s any.',
            'interview_type'            =>      'Personal'
        ]);
    }
}
