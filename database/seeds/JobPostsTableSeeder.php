<?php

use Illuminate\Database\Seeder;
use App\JobPost;

class JobPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobPost::truncate();
        JobPost::create([
            'employer_id'           => 1,
            'currency_id'           => 1,
            'description'           => 'We are looking for a backend engineer to build and manage microservices and web/mobile applications. You must have experience in developing secure and scalable microservices. The role involves understanding business requirements from the product team, then defining and creating secure, standards-compliant, and high-performance microservices, including the server-side and back-end storage components. You must have an understanding of agile development methodologies, version control, test-driven development and continuous integration.',
            'title'                 => 'Software Engineer IV',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Makati City',
            'salary_range_minimum'  => 25000,
            'salary_range_maximum'  => 37000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, HTML5, Magento, Drupal, CMS, Git',
            'recruitment_period'    => '01/16/2020 - 02/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 3,
            'currency_id'           => 1,
            'description'           => 'We are an operating system for Southeast Asian budget & mid range hotels. We allow our hotel clients to be more productive and competitive: increase revenue,optimize cost base and increase guest trust & satisfaction. Through technological and operational solutions, we address the deep, widespread inefficiencies in the Southeast Asian budget & mid range hospitality sector.',
            'title'                 => 'Telesales Executive',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Hospitality and Tourism',
            'job_location'          => 'Pasay City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Cooking, NCII Bedkeeping, Bedkeep,                                     Frontdesk',
            'recruitment_period'    => '07/15/2018 - 02/05/2020',
            'created_at'            => '2018-7-15 22:15:00'
        ]);

        JobPost::create([
            'employer_id'           => 2,
            'currency_id'           => 1,
            'description'           => 'A software engineer serves primarily to address technical issues relating to software implementation, function and cloud application loaded in our security software product. They resolve customer queries or problems and create product problem reports and troubleshooting documents for each issue.',
            'title'                 => 'Automated QA Tester',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Pasig City',
            'salary_range_minimum'  => 25000,
            'salary_range_maximum'  => 37000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '1- Years',
            'skill'                 => 'PHP, CSS3, HTML5, Magento, Drupal, CMS, Git, Angular6+, ReactJS',
            'recruitment_period'    => '11/16/2019 - 02/05/2020',
            'created_at'            => '2019-11-16 06:00:00'
        ]);

        JobPost::create([
            'employer_id'           => 6,
            'currency_id'           => 1,
            'description'           => 'General cleaning of the office and keeping it clean and in order. Inform relevant officer (s) for any problems that may arise in connection to appliances, equipment, properties and other matters related to the office premises/ concern. Complete assigned tasks in a timely manner with minimal supervision. Buying of employee’s morning and afternoon snacks and lunch outside the office. Sort deliverable items in accordance to proper delivery route in order to ensure maximum efficiency.',
            'title'                 => 'Janitor',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'General Services',
            'job_location'          => 'Muntinlupa City',
            'salary_range_minimum'  => 15000,
            'salary_range_maximum'  => 20000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Analyzing Data, Keen to Details, Auditing compliance, Leadership, Leadership skills',
            'recruitment_period'    => '01/19/2019 - 02/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);
        
        JobPost::create([
            'employer_id'           => 2,
            'currency_id'           => 1,
            'description'           => 'We are an operating system for Southeast Asian budget & mid range hotels. We allow our hotel clients to be more productive and competitive: increase revenue,optimize cost base and increase guest trust & satisfaction. Through technological and operational solutions, we address the deep, widespread inefficiencies in the Southeast Asian budget & mid range hospitality sector.',
            'title'                 => 'Junior Software Engineer',
            'employment_type'       => 'Internship / OJT',
            'position_level'        => 'Internship / OJT',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Pasig City',
            'salary_range_minimum'  => 25000,
            'salary_range_maximum'  => 37000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '0 - 1 Year',
            'skill'                 => 'PHP, CSS3, HTML5, Magento, Drupal, CMS, Git',
            'recruitment_period'    => '03/22/2019 - 02/05/2020',
            'created_at'            => '2019-03-22 08:00:00'
        ]);

        JobPost::create([
            'employer_id'           => 3,
            'currency_id'           => 1,
            'description'           => 'We are an operating system for Southeast Asian budget & mid range hotels. We allow our hotel clients to be more productive and competitive: increase revenue,optimize cost base and increase guest trust & satisfaction. Through technological and operational solutions, we address the deep, widespread inefficiencies in the Southeast Asian budget & mid range hospitality sector.',
            'title'                 => 'Frontdesk Support',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Hospitality and Tourism ',
            'job_location'          => 'Pasay City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Cooking, NCII Bedkeeping, Bedkeep, Frontdesk',
            'recruitment_period'    => '02/15/2019 - 02/05/2020',
            'created_at'            => '2019-02-15 10:00:56'
        ]);

        JobPost::create([
            'employer_id'           => 3,
            'currency_id'           => 1,
            'description'           => 'A software engineer serves primarily to address technical issues relating to software implementation, function and cloud application loaded in our security software product. They resolve customer queries or problems and create product problem reports and troubleshooting documents for each issue.',
            'title'                 => 'Associate Software Engineer',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Hospitality and Tourism',
            'job_location'          => 'Pasay City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, SASS, SCSS, Java, jQuery, MySQL, PostgreSQL',
            'recruitment_period'    => '01/17/2020 - 02/05/2020',
            'created_at'            => '2020-01-17 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 5,
            'currency_id'           => 1,
            'description'           => 'A UI/UX Engineer serves primarily to address technical issues relating to software implementation, function and cloud application loaded in our security software product. They resolve customer queries or problems and create product problem reports and troubleshooting documents for each issue.',
            'title'                 => 'UI/UX Engineer',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Manila City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, SASS, SCSS, Java, jQuery, MySQL, PostgreSQL, Adobe XD, Adobe Photoshop, Adobe Illustrator',
            'recruitment_period'    => '11/29/2019 - 02/05/2020',
            'created_at'            => '2019-11-29 15:00:00'
        ]);

        JobPost::create([
            'employer_id'           => 5,
            'currency_id'           => 1,
            'description'           => 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications. Strive to create visually appealing sites that feature user-friendly design and clear navigation. Once a website is created, a designer helps with maintenance and additions to the website. They work with development teams or managers for keeping the site up-to-date and prioritizing needs, among other tasks.',
            'title'                 => 'Project Manager',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Manila City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, SASS, SCSS, Java, jQuery, MySQL, PostgreSQL, Adobe XD, Adobe Photoshop, Adobe Illustrator',
            'recruitment_period'    => '10/15/2018 - 02/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 2,
            'currency_id'           => 1,
            'description'           => 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications. Strive to create visually appealing sites that feature user-friendly design and clear navigation. Once a website is created, a designer helps with maintenance and additions to the website. They work with development teams or managers for keeping the site up-to-date and prioritizing needs, among other tasks.',
            'title'                 => 'Team Leader',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Pasig City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, SASS, SCSS, Java, jQuery, MySQL, PostgreSQL, Adobe XD, Adobe Photoshop, Adobe Illustrator',
            'recruitment_period'    => '01/16/2020 - 02/05/2020',
            'created_at'            => '2019-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 4,
            'currency_id'           => 1,
            'description'           => 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications. Strive to create visually appealing sites that feature user-friendly design and clear navigation. Once a website is created, a designer helps with maintenance and additions to the website. They work with development teams or managers for keeping the site up-to-date and prioritizing needs, among other tasks.',
            'title'                 => 'Team Leader',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Pasig City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, SASS, SCSS, Java, jQuery, MySQL, PostgreSQL, Adobe XD, Adobe Photoshop, Adobe Illustrator',
            'recruitment_period'    => '01/05/2020 - 02/05/2020',
            'created_at'            => '2020-01-05 08:30:35'
        ]);

        JobPost::create([
            'employer_id'           => 5,
            'currency_id'           => 1,
            'description'           => 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications. Strive to create visually appealing sites that feature user-friendly design and clear navigation. Once a website is created, a designer helps with maintenance and additions to the website. They work with development teams or managers for keeping the site up-to-date and prioritizing needs, among other tasks.',
            'title'                 => 'Manual Quality Analyst',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Manila City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, SASS, SCSS, Java, jQuery, MySQL, PostgreSQL, Adobe XD, Adobe Photoshop, Adobe Illustrator',
            'recruitment_period'    => '01/16/2020 - 02/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 8,
            'currency_id'           => 1,
            'description'           => 'As an Email/Chat Support Associate, you will deliver customer service to the customers and clients of one of the world’s biggest music, podcast and video streaming service, all via email or chat.',
            'title'                 => 'Chat Support Associate',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Fresh Grad / Entry Level',
            'job_specialization'    => 'Architecture and Engineering',
            'job_location'          => 'Marikina City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Analyzing Data, Keen to Details, Auditing compliance, Leadership, Leadership skills',
            'recruitment_period'    => '10/01/2019 - 03/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 5,
            'currency_id'           => 1,
            'description'           => 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications. Strive to create visually appealing sites that feature user-friendly design and clear navigation. Once a website is created, a designer helps with maintenance and additions to the website. They work with development teams or managers for keeping the site up-to-date and prioritizing needs, among other tasks.',
            'title'                 => 'Quality Analyst',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'IT and Software',
            'job_location'          => 'Manila City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'PHP, CSS3, SASS, SCSS, Java, jQuery, MySQL, PostgreSQL, Adobe XD, Adobe Photoshop, Adobe Illustrator',
            'recruitment_period'    => '01/16/2020 - 02/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 6,
            'currency_id'           => 1,
            'description'           => 'Implement of projects or activities based on approved plans, specifications, revision and approved budget within the duration of contract. Responsible for final site topography. Manage site, housing subcontractors and staffs in meeting schedules and quality based on standards with tolerance. Responsible for task assigned by marketing relating with sales, finance or administration on warehousing and water management.',
            'title'                 => 'Site Engineer',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Architecture and Engineering',
            'job_location'          => 'Muntinlupa City',
            'salary_range_minimum'  => 25000,
            'salary_range_maximum'  => 27000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Analyzing Data, Keen to Details, Auditing compliance, Leadership, Leadership skills',
            'recruitment_period'    => '01/19/2019 - 02/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 7,
            'currency_id'           => 1,
            'description'           => 'Execute regular preventive maintenance system required per data and records. Execute other minor PM repair and maintenance. Encode & file the validated complaint subject for PM repair and maintenance.',
            'title'                 => 'Mechanical Engineer',
            'employment_type'       => 'Part-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Architecture and Engineering',
            'job_location'          => 'Marikina City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Analyzing Data, Keen to Details, Auditing compliance, Leadership, Leadership skills',
            'recruitment_period'    => '11/19/2019 - 02/25/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 2,
            'currency_id'           => 1,
            'description'           => 'Maintenance of financial records for cost analysis. Compliance to company policies and procedures. Compliance to administrative requirements. Maintenance of weekly, monthly and annual financial reporting.',
            'title'                 => 'Accountant',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Accountant / Finance Manager',
            'job_location'          => 'Pasig City',
            'salary_range_minimum'  => 25000,
            'salary_range_maximum'  => 37000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '1- Years',
            'skill'                 => 'CPA, Confidence, Analyst',
            'recruitment_period'    => '11/16/2019 - 02/05/2020',
            'created_at'            => '2019-11-16 06:00:00'
        ]);

        JobPost::create([
            'employer_id'           => 6,
            'currency_id'           => 1,
            'description'           => 'Implement of projects or activities based on approved plans, specifications, revision and approved budget within the duration of contract. Responsible for final site topography. Manage site, housing subcontractors and staffs in meeting schedules and quality based on standards with tolerance. Responsible for task assigned by marketing relating with sales, finance or administration on warehousing and water management.',
            'title'                 => 'Technician',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Architecture and Engineering',
            'job_location'          => 'Muntinlupa City',
            'salary_range_minimum'  => 25000,
            'salary_range_maximum'  => 27000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Analyzing Data, Keen to Details, Auditing compliance, Leadership, Leadership skills',
            'recruitment_period'    => '01/19/2019 - 02/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);

        JobPost::create([
            'employer_id'           => 7,
            'currency_id'           => 1,
            'description'           => 'Execute regular preventive maintenance system required per data and records. Execute other minor PM repair and maintenance. Encode & file the validated complaint subject for PM repair and maintenance.',
            'title'                 => 'Costing Engineer',
            'employment_type'       => 'Full-time',
            'position_level'        => 'Associate / Supervisor',
            'job_specialization'    => 'Architecture and Engineering',
            'job_location'          => 'Marikina City',
            'salary_range_minimum'  => 35000,
            'salary_range_maximum'  => 47000,
            'education_level'       => 'Bachelor graduate',
            'years_experience'      => '2-4 Years',
            'skill'                 => 'Analyzing Data, Keen to Details, Auditing compliance, Leadership, Leadership skills',
            'recruitment_period'    => '10/01/2019 - 03/05/2020',
            'created_at'            => '2020-01-16 09:15:35'
        ]);
    }
}