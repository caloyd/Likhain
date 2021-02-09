<?php

use Illuminate\Database\Seeder;
use App\EmployeeSalary;

class EmployeeSalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeSalary::truncate();
        EmployeeSalary::create([
            'employee_id' => 1,
            'employer_id' => 3,
            'currency_id' => 1,
            'amount' => '15000'
        ]);

        EmployeeSalary::create([
            'employee_id' => 2,
            'employer_id' => 1,
            'currency_id' => 1,
            'amount' => '16000'
        ]);

        EmployeeSalary::create([
            'employee_id' => 3,
            'employer_id' => 3,
            'currency_id' => 1,
            'amount' => '16000'
        ]);

        EmployeeSalary::create([
            'employee_id' => 4,
            'employer_id' => 2,
            'currency_id' => 1,
            'amount' => '17000'
        ]);

        EmployeeSalary::create([
            'employee_id' => 5,
            'employer_id' => 2,
            'currency_id' => 1,
            'amount' => '18000'
        ]);
    }
}
