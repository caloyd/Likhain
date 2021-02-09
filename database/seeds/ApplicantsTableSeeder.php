<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use App\Skill;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applicant::truncate();
        DB::table('applicant_skills')->truncate();

        $applicantSkill = Skill::where('name', 'C language')->first();
        $applicantSkill1 = Skill::where('name', 'Java')->first();
        $applicantSkill2 = Skill::where('name', 'Python')->first();
        $applicantSkill3 = Skill::where('name', 'PHP')->first();
        $applicantSkill4 = Skill::where('name', 'HTML')->first();
        $applicantSkill5 = Skill::where('name', 'CSS')->first();
        $applicantSkill6 = Skill::where('name', 'Javascript')->first();
        $applicantSkill7 = Skill::where('name', 'Adobe Photoshop')->first();
        $applicantSkill8 = Skill::where('name', 'Adobe Illustrator')->first();
        $applicantSkill9 = Skill::where('name', 'Laravel Framework')->first();

        $applicant1 = Applicant::create([
            'user_id' => 12,
            'currency_id' => 1,
            'gender' => 'Male',
            'birth_date' => '1998-09-02',
            'address' => 'Philippines, CALABARZON, San Pedro',
            'contact_number' => '09123456789',
            'expected_salary' => 20000,
        ]);
        $applicant2 = Applicant::create([
            'user_id' => 13,
            'currency_id' => 1,
            'gender' => 'Male',
            'birth_date' => '1996-06-10',
            'address' => 'Philippines, CALABARZON, Los Banos',
            'contact_number' => '09123456789',
            'expected_salary' => 19000,
        ]);
        $applicant3 = Applicant::create([
            'user_id' => 14,
            'currency_id' => 1,
            'gender' => 'Male',
            'birth_date' => '2000-01-05',
            'address' => 'Philippines, Metro Manila, Makati City', 
            'contact_number' => '09123456789',
            'expected_salary' => 21000,
        ]);

        $applicant1->skills()->attach($applicantSkill3, ['years_of_experience' => '0 - 2']);
        $applicant1->skills()->attach($applicantSkill2, ['years_of_experience' => '2 - 3']);
        $applicant1->skills()->attach($applicantSkill, ['years_of_experience' => '3 - 5']);
    }
}
