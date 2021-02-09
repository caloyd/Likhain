<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        Admin::create([
            'user_id' => 1,
            'contact_number' => '09771778888'
        ]);

        Admin::create([
            'user_id' => 2,
            'contact_number' => '09123456789'
        ]);
    }
}
