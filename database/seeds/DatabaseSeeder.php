<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(ApplicantsTableSeeder::class);
        $this->call(ApplicantEducationBackgroundsTableSeeder::class);
        $this->call(ApplicantWorkExperiencesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(EmployersTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(JobPostsTableSeeder::class);
        $this->call(InterviewsTableSeeder::class);
        $this->call(JobOffersTableSeeder::class);
        $this->call(SavedJobPostTableSeeder::class);
        $this->call(CompanyDocumentsTableSeeder::class);
        $this->call(ApplicantFeedbackTableSeeder::class);
        $this->call(JobApplicationsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(EmployeeLeavesTableSeeder::class);
        $this->call(CompanySubmitDocsTableSeeder::class);
        $this->call(EmployeeSalariesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
