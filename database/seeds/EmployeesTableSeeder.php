<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();
        Employee::create([
            'employer_id'           =>          3,
            'user_id'               =>          15,
            'address'               =>          'San Miguel Drive, Pasig City',
            'contact_number'        =>          '09182734566',
            'job_position'          =>          'Software Engineer III',
            'employment_date'       =>          '2019-10-01'
        ]);

        Employee::create([
            'employer_id'           =>          1,
            'user_id'               =>          16,
            'address'               =>          'Merville, Parañaque City',
            'contact_number'        =>          '09325741863',
            'job_position'          =>          'Software Engineer III',
            'employment_date'       =>          '2019-02-28'
        ]);

        Employee::create([
            'employer_id'           =>          3,
            'user_id'               =>          17,
            'address'               =>          'Lower Bicutan,Taguig',
            'contact_number'        =>          '09232123121',
            'job_position'          =>          'Manual Analyst',
            'employment_date'       =>          '2019-08-17'
        ]);

        Employee::create([
            'employer_id'           =>          2,
            'user_id'               =>          18,
            'address'               =>          'FTI, Taguig City',
            'contact_number'        =>          '09223441222',
            'job_position'          =>          'Quality Analyst',
            'employment_date'       =>          '2018-06-11'
        ]);

        Employee::create([
            'employer_id'           =>          2,
            'user_id'               =>          19,
            'address'               =>          'Rockwell, Makati City',
            'contact_number'        =>          '09330874562',
            'job_position'          =>          'Team Leader',
            'employment_date'       =>          '2015-07-23'
        ]);

    }
}
