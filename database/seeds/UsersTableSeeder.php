<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        //////////////////////////////////////////
        /////////////// SUPERADMIN //////////////
        ////////////////////////////////////////
        User::create([
            'user_type_id' => 1,
            'first_name' => 'Superadmin',
            'last_name' => '001',
            'email' => 'superadmin001@example.com',
            'password' => Hash::make('password')
        ]);
        //////////////////////////////////////////
        /////////// end SUPERADMIN //////////////
        ////////////////////////////////////////


        //////////////////////////////////////////
        ///////////////// ADMIN /////////////////
        ////////////////////////////////////////
        User::create([
            'user_type_id' => 2,
            'first_name' => 'Admin',
            'last_name' => '001',
            'email' => 'admin001@example.com',
            'password' => Hash::make('password')
        ]);
        //////////////////////////////////////////
        ///////////// end ADMIN /////////////////
        ////////////////////////////////////////

        
        //////////////////////////////////////////
        //////// EMPLOYER ADMIN /////////////////
        ////////////////////////////////////////
        User::create([
            'user_type_id' => 3,
            'first_name' => 'Employeradmin',
            'last_name' => '001',
            'email' => 'employeradmin001@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'Erick James',
            'last_name' => 'Egam',
            'email' => 'indracompany@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'Ejhay',
            'last_name' => 'Egam',
            'email' => 'zenhotels@email.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'EJ',
            'last_name' => 'EJ',
            'email' => 'denstotechs@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'Carlo',
            'last_name' => 'Orange',
            'email' => 'orangebrowntech@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'Malone',
            'last_name' => 'Ranger',
            'email' => 'maloneranger@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'Jineses Abdol',
            'last_name' => 'Chanchad',
            'email' => 'jinesesabdhol@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'Kaminari',
            'last_name' => 'Uzumaki',
            'email' => 'sutherland@example.com',
            'password' => Hash::make('password')
        ]);
        //////////////////////////////////////////
        //////// end EMPLOYER ADMIN /////////////
        ////////////////////////////////////////

        //////////////////////////////////////////
        //////// EMPLOYER STAFF /////////////////
        ////////////////////////////////////////
        User::create([
            'user_type_id' => 4,
            'first_name' => 'Employerstaff',
            'last_name' => '001',
            'email' => 'employerstaff001@example.com',
            'password' => Hash::make('password')   
        ]);
        //////////////////////////////////////////
        //////// end EMPLOYER STAFF /////////////
        ////////////////////////////////////////

        //////////////////////////////////////////
        ///////////// APPLICANT /////////////////
        ////////////////////////////////////////
        User::create([
            'user_type_id' => 5,
            'first_name' => 'Applicant',
            'last_name' => '001',
            'email' => 'applicant001@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'user_type_id' => 5,
            'first_name' => 'Applicant',
            'last_name' => '002',
            'email' => 'applicant002@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'user_type_id' => 5,
            'first_name' => 'Applicant',
            'last_name' => '003',
            'email' => 'applicant003@example.com',
            'password' => Hash::make('password')
        ]);
        //////////////////////////////////////////
        ////////// end APPLICANT ////////////////
        ////////////////////////////////////////

        //////////////////////////////////////////
        ///////////// EMPLOYEE /////////////////
        ////////////////////////////////////////
        User::create([
            'user_type_id' => 6,
            'first_name' => 'Employee',
            'last_name' => '001',
            'email' => 'employee001@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'user_type_id' => 6,
            'first_name' => 'Tanjirou',
            'last_name' => 'Kamado',
            'middle_name' => 'Alexander',
            'email' => 'tanjirou@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'user_type_id' => 6,
            'first_name' => 'Will',
            'last_name' => 'Dasovich',
            'middle_name' => 'Smith',
            'email' => 'willdasovich@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'user_type_id' => 6,
            'first_name' => 'Kimmychan',
            'last_name' => 'Bengi',
            'email' => 'kimmychan@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'user_type_id' => 6,
            'first_name' => 'Kanao',
            'last_name' => 'Kanae',
            'email' => 'kanaokanae@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
