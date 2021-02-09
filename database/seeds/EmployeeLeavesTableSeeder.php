<?php

use Illuminate\Database\Seeder;
use App\EmployeeLeave;

class EmployeeLeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeLeave::truncate();

        EmployeeLeave::create([
            'employee_id' => 1,
            'employer_id' => 3,
            'leave_type' => 'Vacation',
            'leave_reason' => 'Personal reason',
            'start_date' => '03/01/2020',
            'end_date' => '03/02/2020'
        ]);

        EmployeeLeave::create([
            'employee_id' => 2,
            'employer_id' => 3,
            'leave_type' => 'Sick',
            'leave_reason' => 'Mild Fever',
            'start_date' => '04/01/2020',
            'end_date' => '04/01/2020'
        ]);

        EmployeeLeave::create([
            'employee_id' => 4,
            'employer_id' => 2,
            'leave_type' => 'Vacation',
            'leave_reason' => 'Family Vacation',
            'start_date' => '08/01/2020',
            'end_date' => '08/05/2020'
        ]);

        EmployeeLeave::create([
            'employee_id' => 5,
            'employer_id' => 2,
            'leave_type' => 'Sick',
            'leave_reason' => 'Medical reasons',
            'start_date' => '07/31/2020',
            'end_date' => '07/31/2020'
        ]);
        EmployeeLeave::create([
            'employee_id' => 6,
            'employer_id' => 2,
            'leave_type' => 'Vacation',
            'leave_reason' => 'Trip to Palawan',
            'start_date' => '04/01/2020',
            'end_date' => '04/10/2020'
        ]);
        EmployeeLeave::create([
            'employee_id' => 7,
            'employer_id' => 1,
            'leave_type' => 'Vacation',
            'leave_reason' => 'Personal reason',
            'start_date' => '06/14/2020',
            'end_date' => '06/15/2020'
        ]);
        EmployeeLeave::create([
            'employee_id' => 8,
            'employer_id' => 1,
            'leave_type' => 'Vacation',
            'leave_reason' => 'Assist son to school',
            'start_date' => '06/10/2020',
            'end_date' => '06/10/2020'
        ]);
    }
}
