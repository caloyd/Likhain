<?php

use Illuminate\Database\Seeder;
use App\ApplicantFeedback;

class ApplicantFeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantFeedback::truncate();
        ApplicantFeedback::create([
            'applicant_id'                      =>                 1,
            'employer_id'                       =>                 2,
            'job_post_id'                       =>                 3,
            'job_application_id'                =>                 1,                  
            'description'                       =>                 'His effective leadership allows his team’s time management and attendance to be among the best in the company.',
            'created_at'                        =>                  '2019-08-13 08:00:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 3,
            'employer_id'                       =>                 2,
            'job_post_id'                       =>                 5,
            'job_application_id'                =>                 3,                
            'description'                       =>                 'Something I really appreciate about you is your aptitude for problem solving in a proactive way.',
            'created_at'                        =>                  '2019-09-13 23:00:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 2,
            'employer_id'                       =>                 2,
            'job_post_id'                       =>                10,
            'job_application_id'                =>                 5,
            'description'                       =>                 'I think you did a great job when you ran the all hands meeting. It showed that you are capable of getting people to work together and communicate effectively. I admire your communication skills.',
            'created_at'                        =>                  '2019-07-09 06:27:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 1,
            'employer_id'                       =>                 5,
            'job_post_id'                       =>                 9,
            'job_application_id'                =>                  2,                
            'description'                       =>                 'Sometimes a manager will receive feedback on their direct report. This is a tricky situation, because feedback should generally avoid hearsay and focus on an individual’s unique experience.',
            'created_at'                        =>                  '2019-03-09 05:27:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 3,
            'employer_id'                       =>                 5,
            'job_post_id'                       =>                 9,
            'job_application_id'                =>                 3,                
            'description'                       =>                 'Also useful in a project-based environment, but can be utilized anytime to start a feedback conversation. Be sure to give the person time to share their own feelings on the situation.',
            'created_at'                        =>                  '2019-04-09 11:13:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 2,
            'employer_id'                       =>                 5,
            'job_post_id'                       =>                 9,
            'job_application_id'                =>                 6,                
            'description'                       =>                 'Put yourself in the shoes of the person about to be given feedback. Consider whether they are in the best mindset to receive your feedback, and if you are in an open mindset to give it. Strong emotions can cloud a person’s ability to accept feedback, whether it’s reinforcing or redirecting.',
            'created_at'                        =>                  '2019-11-09 01:05:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 2,
            'employer_id'                       =>                 7,
            'job_post_id'                       =>                16,
            'job_application_id'                =>                 7,                
            'description'                       =>                 'Think about the person you’re about to speak with before giving feedback. What is the purpose of your feedback and what do you want the outcome to be – do you see value in the person changing or repeating their behavior? How do you think they could do so to achieve this outcome?',
            'created_at'                        =>                  '2019-08-09 02:15:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 3,
            'employer_id'                       =>                 7,
            'job_post_id'                       =>                16,
            'job_application_id'                =>                 4,                
            'description'                       =>                 'Whether providing reinforcing or redirecting employee feedback, specificity is important for learning. It also serves as a basis for comparison and a guide for future behavior.',
            'created_at'                        =>                  '2019-07-11 21:15:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 1,
            'employer_id'                       =>                 1,
            'job_post_id'                       =>                 1,
            'job_application_id'                =>                 8,                
            'description'                       =>                 'You did a great job yesterday by gathering all of your team members and asking them for an input regarding XY. This really helped everyone feel like they were part of the process. I also liked how you asked everyone a question related to their expertise. It was a great way to encourage participation.',
            'created_at'                        =>                  '2019-09-11 21:15:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 3,
            'employer_id'                       =>                 1,
            'job_post_id'                       =>                 1,
            'job_application_id'                =>                 9,                
            'description'                       =>                 'I have received your sales report from the last quarter. And you’ve exceeded your set goals by 25%! This is a massive contribution to the overall department goal. I would hugely appreciate if you could get together a small 1-minute presentation to give to the team at our next catch up.',
            'created_at'                        =>                  '2020-02-11 7:11:00'
        ]);

        ApplicantFeedback::create([
            'applicant_id'                      =>                 2,
            'employer_id'                       =>                 1,
            'job_post_id'                       =>                 1,
            'job_application_id'                =>                 10,                
            'description'                       =>                 'I really like how you dealt with the client. It was a tough situation, but you handled it well. There is one thing which you might want to change next time you deal with a difficult client.',
            'created_at'                        =>                  '2020-02-27 11:27:00'
        ]);
    }
}
