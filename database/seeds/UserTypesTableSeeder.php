<?php

use Illuminate\Database\Seeder;
use App\UserType;
class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        UserType::truncate();
        UserType::create(['name' => 'superadmin']);
        UserType::create(['name' => 'admin']);
        UserType::create(['name' => 'employeradmin']);
        UserType::create(['name' => 'employerstaff']);
        UserType::create(['name' => 'applicant']);
        UserType::create(['name' => 'employee']);
    }
}
