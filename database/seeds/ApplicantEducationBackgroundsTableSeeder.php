<?php

use Illuminate\Database\Seeder;
use App\ApplicantEducationBackground;

class ApplicantEducationBackgroundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantEducationBackground::truncate();
        ApplicantEducationBackground::create([
            'applicant_id' => 1,
            'education_attainment' => 'Bachelor\'s Degree Graduate',
            'course_degree' => 'Information Technology',
            'school' => 'University of the Philippines',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque dolor eget bibendum vulputate. Nam nec ante mauris. Donec purus ex, aliquet in bibendum vitae, luctus ut nibh.',
            'date_from' => '2015-06-01',
            'date_to' => '2019-04-01'
        ]);
        ApplicantEducationBackground::create([
            'applicant_id' => 2,
            'education_attainment' => 'Vocational Graduate',
            'course_degree' => 'Computer Science',
            'school' => 'Polytechnic University of the Philippines',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque dolor eget bibendum vulputate. Nam nec ante mauris. Donec purus ex, aliquet in bibendum vitae, luctus ut nibh.',
            'date_from' => '2015-06-01',
            'date_to' => '2019-04-01'
        ]);
        ApplicantEducationBackground::create([
            'applicant_id' => 3,
            'education_attainment' => 'Master\'s Degree Graduate',
            'course_degree' => 'Computer Science',
            'school' => 'Technological University of the Philippines',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque dolor eget bibendum vulputate. Nam nec ante mauris. Donec purus ex, aliquet in bibendum vitae, luctus ut nibh.',
            'date_from' => '2015-06-01',
            'date_to' => '2019-04-01'
        ]);
        
    }
}
