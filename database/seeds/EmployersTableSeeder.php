<?php

use Illuminate\Database\Seeder;
use App\Employer;

class EmployersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::truncate();

        Employer::create([
            'user_id' => 3,
            'company_id' => 1,
        ]);

        Employer::create([
            'user_id' => 4,
            'company_id' => 2,
        ]);

        Employer::create([
            'user_id' => 5,
            'company_id' => 3,
        ]);

        Employer::create([
            'user_id' => 6,
            'company_id' => 4,
        ]);

        Employer::create([
            'user_id' => 7,
            'company_id' => 5,
        ]);

        Employer::create([
            'user_id' => 8,
            'company_id' => 6,
        ]);

        Employer::create([
            'user_id' => 9,
            'company_id' => 7,
        ]);
        
        Employer::create([
            'user_id' => 10,
            'company_id' => 8,
        ]);

        Employer::create([
            'user_id' => 11,
            'company_id' => 9,
        ]);
    }
}
