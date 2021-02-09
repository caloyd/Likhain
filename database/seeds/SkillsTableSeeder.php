<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::truncate();
        Skill::create(['name' => 'C language']);
        Skill::create(['name' => 'Java']);
        Skill::create(['name' => 'Python']);
        Skill::create(['name' => 'PHP']);
        Skill::create(['name' => 'HTML']);
        Skill::create(['name' => 'CSS']);
        Skill::create(['name' => 'Javascript']);
        Skill::create(['name' => 'Adobe Photoshop']);
        Skill::create(['name' => 'Adobe Illustrator']);
        Skill::create(['name' => 'Laravel Framework']);
    }
}
