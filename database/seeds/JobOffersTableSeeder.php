<?php

use Illuminate\Database\Seeder;
use App\JobOffer;

class JobOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobOffer::truncate();
        JobOffer::create([
            'applicant_id'              =>              1,
            'employer_id'               =>              2,
            'job_post_id'               =>              3,
            'job_offer_date'            =>              '02/01/2020',
            'job_offer_time'            =>              '10:00 AM',
            'job_offer_address'         =>              'RBC 11th Floor, Ortigas, Pasig City',
            'contact_number'            =>              '09454598711',
            'contact_name'              =>              'Maria Fernandez',
            'job_offer_note'            =>              'Please bring your 2 valid ID\'s and a ballpen. See you there!'
        ]);

        JobOffer::create([
            'applicant_id'              =>              2,
            'employer_id'               =>              3,
            'job_post_id'               =>              2,
            'job_offer_date'            =>              '02/01/2020',
            'job_offer_time'            =>              '10:00 AM',
            'job_offer_address'         =>              'E-COM Bldg, Pasay City',
            'contact_number'            =>              '09454666711',
            'contact_name'              =>              'Miho Fukuda',
            'job_offer_note'            =>              'Please bring your 2 valid ID\'s and a ballpen. See you there!'
        ]);

        JobOffer::create([
            'applicant_id'              =>              3,
            'employer_id'               =>              3,
            'job_post_id'               =>              5,
            'job_offer_date'            =>              '02/01/2020',
            'job_offer_time'            =>              '10:00 AM',
            'job_offer_address'         =>              'E-COM Bldg, Pasay City',
            'contact_number'            =>              '09454666711',
            'contact_name'              =>              'Miho Fukuda',
            'job_offer_note'            =>              'Please bring your 2 valid ID\'s and a ballpen. See you there!'
        ]);

        JobOffer::create([
            'applicant_id'              =>              1,
            'employer_id'               =>              3,
            'job_post_id'               =>              6,
            'job_offer_date'            =>              '02/01/2020',
            'job_offer_time'            =>              '10:00 AM',
            'job_offer_address'         =>              'E-COM Bldg, Pasay City',
            'contact_number'            =>              '09454598711',
            'contact_name'              =>              'Maria Fernandez',
            'job_offer_note'            =>              'Please bring your 2 valid ID\'s and a ballpen. See you there!'
        ]);

        JobOffer::create([
            'applicant_id'              =>              1,
            'employer_id'               =>              3,
            'job_post_id'               =>              5,
            'job_offer_date'            =>              '02/14/2020',
            'job_offer_time'            =>              '10:00 AM',
            'job_offer_address'         =>              'E-COM Bldg, Pasay City',
            'contact_number'            =>              '09454598711',
            'contact_name'              =>              'Maria Fernandez',
            'job_offer_note'            =>              'Please bring your 2 valid ID\'s and a ballpen. See you there!'
        ]);
    }
}
