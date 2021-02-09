<?php

use Illuminate\Database\Seeder;
use App\SavedJob;

class SavedJobPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /////////////////////////////////
        //////// APPLICANT 1 ///////////
        ///////////////////////////////
        SavedJob::create([
            'applicant_id'      =>  1,
            'job_post_id'       =>  1,
            'created_at'        => '2020-01-24 06:34:00'
        ]);

        SavedJob::create([
            'applicant_id'      =>  1,
            'job_post_id'       =>  9,
            'created_at'        => '2019-12-24 06:04:00'
        ]);

        SavedJob::create([
            'applicant_id'      =>  1,
            'job_post_id'       =>  11,
            'created_at'        => '2020-01-19 17:00:03'
        ]);

        SavedJob::create([
            'applicant_id'      =>  1,
            'job_post_id'       =>  12,
            'created_at'        => '2020-01-07 9:00:03'
        ]);
        /////////////////////////////////////
        //////// end APPLICANT 1 ///////////
        ///////////////////////////////////


        /////////////////////////////////
        //////// APPLICANT 2 ///////////
        ///////////////////////////////
        SavedJob::create([
            'applicant_id'      =>  2,
            'job_post_id'       =>  1,
            'created_at'        => '2020-01-27 03:53:00'
        ]);

        SavedJob::create([
            'applicant_id'      =>  2,
            'job_post_id'       => 8,
            'created_at'        => '2020-01-27 21:00:00'
        ]);

        SavedJob::create([
            'applicant_id'      =>  2,
            'job_post_id'       =>  2,
            'created_at'        => '2020-01-27 00:53:00'
        ]);

        SavedJob::create([
            'applicant_id'      =>  2,
            'job_post_id'       =>  5,
            'created_at'        => '2020-01-27 14:13:00'
        ]);
        /////////////////////////////////////
        //////// end APPLICANT 2 ///////////
        ///////////////////////////////////


        /////////////////////////////////
        //////// APPLICANT 3 ///////////
        ///////////////////////////////
        SavedJob::create([
            'applicant_id'      =>  3,
            'job_post_id'       =>  2,
            'created_at'        => '2020-01-15 1:04:00'
        ]);

        SavedJob::create([
            'applicant_id'      =>  3,
            'job_post_id'       =>  7,
            'created_at'        => '2020-01-17 06:34:00'
        ]);

        SavedJob::create([
            'applicant_id'      =>  3,
            'job_post_id'       =>  10,
            'created_at'        => '2020-01-21 22:51:00'
        ]);
        /////////////////////////////////////
        //////// end APPLICANT 3 ///////////
        ///////////////////////////////////
    }
}