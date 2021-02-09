<?php

use Illuminate\Database\Seeder;
use App\ApplicantWorkExperience;

class ApplicantWorkExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantWorkExperience::truncate();
        ApplicantWorkExperience::create([
            'applicant_id' => 1,
            'currency_id' => 3,
            'company_name' => 'Accenture',
            'job_title' => 'Associate Software Engineer',
            'date_from' => '2019-05-01',
            'date_to' => '2019-09-01',
            'previous_salary' => 25000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque dolor eget bibendum vulputate.'
        ]);
    }
}
