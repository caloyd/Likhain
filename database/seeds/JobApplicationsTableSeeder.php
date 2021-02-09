<?php

use Illuminate\Database\Seeder;
use App\JobApplication;

class JobApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobApplication::truncate();
        JobApplication::create([
            'applicant_id'          =>          1,
            'job_post_id'           =>          3,
            'job_pitch'             =>          'My real strength is my attention to detail. I pride myself on my reputation for following through and meeting deadlines. When I commit to doing something, I make sure it gets done, and on time.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-11-16 09:15:35'
        ]);

        JobApplication::create([
            'applicant_id'          =>          1,
            'job_post_id'           =>          2,
            'job_pitch'             =>          'What I am looking for now is a company that values customer relations, where I can join a strong team and have a positive impact on customer retention and sales.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-12-03 23:11:35'
        ]);

        JobApplication::create([
            'applicant_id'          =>          3,
            'job_post_id'           =>          9,
            'job_pitch'             =>          'I have been in the customer service industry for the past five years. My most recent experience has been handling incoming calls in the high tech industry.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-12-07 11:11:35'
        ]);

        JobApplication::create([
            'applicant_id'          =>          3,
            'job_post_id'           =>          16,
            'job_pitch'             =>          'One reason I particularly enjoy this business, and the challenges that go along with it, is the opportunity to connect with people. In my last job, I formed some significant customer relationships resulting in a 30 percent increase in sales in a matter of months.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-12-07 14:23:11'
        ]);

        JobApplication::create([
            'applicant_id'          =>          2,
            'job_post_id'           =>          10,
            'job_pitch'             =>          'I began my career in retail management, but a few years ago, I was drawn to the healthcare space. I’ve always been skilled at bringing people together and working towards common goals.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-10-15 16:11:35'
        ]);

        JobApplication::create([
            'applicant_id'          =>          2,
            'job_post_id'           =>          9,
            'job_pitch'             =>          'My experience successfully leading teams and managing stores led me to consider administration, and I’ve been building a career as a driven health administrator for the last four years.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-08-07 20:11:35'
        ]);

        JobApplication::create([
            'applicant_id'          =>          2,
            'job_post_id'           =>          16,
            'job_pitch'             =>          'I set and oversee goals related to department budget and patient volume. Last year, I worked with our IT department to implement a communication system for scheduling procedures and protocols to ensure that all departments were adequately staffed at all times. With our new online scheduling portal, we increased communication efficiency by 20%.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-07-24 20:11:35'
        ]);

        JobApplication::create([
            'applicant_id'          =>          1,
            'job_post_id'           =>          1,
            'job_pitch'             =>          'I have spent the last six years developing my skills as a customer service manager for Megacompany Inc., where I have won several performance awards and been promoted twice. I love managing teams and solving customer problems.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2019-07-28 20:05:00'
        ]);

        JobApplication::create([
            'applicant_id'          =>          3,
            'job_post_id'           =>          1,
            'job_pitch'             =>          'I led my division in sales for the last three years and had the opportunity to bring in more than $18 million worth of new business during that time.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2020-01-13 08:27:00'
        ]);
        
        JobApplication::create([
            'applicant_id'          =>          2,
            'job_post_id'           =>          1,
            'job_pitch'             =>          'Although I like my job, at this stage of my career, I realized I need to find a company where I see a long-term career path and I think this position would be a great fit with my skills and goals.',
            'job_apply_status'      =>          'In Queue',
            'created_at'            =>          '2020-01-13 10:31:26'
        ]);
    }
}
