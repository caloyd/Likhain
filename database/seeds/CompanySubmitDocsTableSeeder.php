<?php

use Illuminate\Database\Seeder;
use App\CompanySubmitDoc;

class CompanySubmitDocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanySubmitDoc::truncate();
        CompanySubmitDoc::create([
            'company_documents_id' => 1,
            'company_id' => 1,
            'file_path' => 'docs/lorem-ipsum.pdf',
            'status' => 'Uploaded'
        ]);
        CompanySubmitDoc::create([
            'company_documents_id' => 2,
            'company_id' => 1,
            'file_path' => 'docs/image-one.jpg',
            'status' => 'Uploaded'
        ]);
        CompanySubmitDoc::create([
            'company_documents_id' => 3,
            'company_id' => 2,
            'file_path' => 'docs/image-two.jpg',
            'status' => 'Uploaded'
        ]);
        CompanySubmitDoc::create([
            'company_documents_id' => 4,
            'company_id' => 2,
            'file_path' => 'docs/image-three.jpg',
            'status' => 'Uploaded'
        ]);
        CompanySubmitDoc::create([
            'company_documents_id' => 5,
            'company_id' => 3,
            'file_path' => 'docs/image-four.jpeg',
            'status' => 'Uploaded'
        ]);
    }
}
