<?php

use Illuminate\Database\Seeder;
use App\CompanyDocument;

class CompanyDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyDocument::truncate();

        CompanyDocument::create([
            'file_name'     => 'DTI/SEC Registration',
        ]);

        CompanyDocument::create([
            'file_name'     => 'Brgy. Clearance',
        ]);

        CompanyDocument::create([
            'file_name'     => 'Community Tax Certificate',
        ]);

        CompanyDocument::create([
            'file_name'     => 'Contract of Lease',
        ]);

        CompanyDocument::create([
            'file_name'     => 'Occupancy Permit',
        ]);

        CompanyDocument::create([
            'file_name'     => 'Business Permit',
        ]);

        CompanyDocument::create([
            'file_name'     => 'Sketch of location',
        ]);
    }
}
