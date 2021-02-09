<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        Company::create([
            'company_logo_path'     => 'img/companies/fgsp.png',
            'address'               => 'Makati City',
            'company_email'         => 'fgsp@info.ph',
            'description'           => 'We provide web design and maintenance services to companies and individuals. Specifically, we create for our clients’ customized websites that convey their message and company’s theme in an effective and eye-catching way, and once the site is up and running, we take responsible for ensuring that it does not have any technical issues.',
            'registration_number'   => '23233-565',
            'number_of_employees'   => '100-200',
            'contact_number'        => '09234321234',
            'postal_code'           => '4418',
            'website'               => 'www.fgsp.ph',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Casual',
            'language'              => 'Filipino, English',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'Feemo Global Solutions',
            'industry'              => 'Computer/Information Technology (Software)'
        ]);

        Company::create([
            'company_logo_path'     => 'img/companies/indra.png',
            'address'               => 'Pasig City',
            'company_email'         => 'indracompany@spph.com',
            'description'           => 'Indra is a global company of technology, innovation, and talent, leader in high value-added solutions and services for the Transport and Traffic, Energy and Industry, Public Administration and Healthcare, Finance, Insurance, Security and Defence, and Telecom and Media sectors.',
            'registration_number'   => '5432-2442',
            'number_of_employees'   => '201-500',
            'contact_number'        => '09224223332',
            'postal_code'           => '2234',
            'website'               => 'www.indracompany.ph',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Formal',
            'language'              => 'Filipino, English, Spanish, Hindi, Japanese',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'Indra Philippines, Inc.',
            'industry'              => 'Computer/Information Technology (Software)'
        ]);

        Company::create([
            'company_logo_path'     => 'img/companies/zenhotels.png',
            'address'               => 'Pasay City',
            'company_email'         => 'zen@hotels.com',
            'description'           => 'We are an operating system for Southeast Asian budget & mid range hotels. We allow our hotel clients to be more productive and competitive: increase revenue, optimize cost base and increase guest trust & satisfaction. Through technological and operational solutions, we address the deep, widespread inefficiencies in the Southeast Asian budget & mid range hospitality sector.',
            'registration_number'   => '5433-6782',
            'number_of_employees'   => '51-200',
            'contact_number'        => '09892308762',
            'postal_code'           => '1300',
            'website'               => 'www.zenhotels.ph',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Formal',
            'language'              => 'Filipino, English',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'Zen Hotels, Inc.',
            'industry'              => 'Hotel/Hospitality'
        ]);

        Company::create([
            'company_logo_path'     => 'img/companies/denso.png',
            'address'               => 'Pasig City',
            'company_email'         => 'densotech@email.com',
            'description'           => 'It is said that the automobile industry is facing a once in a century paradigm shift today due to technologies such as electric vehicles (EVs and PHVs), self-driving vehicles, and the "connected car" - where cars are connected to each other and society using communication to dramatically improve safety and convenience. These technologies are changing rapidly on a daily basis.',
            'registration_number'   => '5473-6782',
            'number_of_employees'   => '51-200',
            'contact_number'        => '09892399762',
            'postal_code'           => '1500',
            'website'               => 'www.densotech.com',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Formal',
            'language'              => 'Filipino, English',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'DensoTech, Inc.',
            'industry'              => 'Construction/Building/Engineering'
        ]);

        Company::create([
            'company_logo_path'     => 'img/companies/orangebrown.png',
            'address'               => 'Manila City',
            'company_email'         => 'orangebrowntech@email.com',
            'description'           => 'It is said that the automobile industry is facing a once in a century paradigm shift today due to technologies such as electric vehicles (EVs and PHVs), self-driving vehicles, and the "connected car" - where cars are connected to each other and society using communication to dramatically improve safety and convenience. These technologies are changing rapidly on a daily basis.',
            'registration_number'   => '5473-6782',
            'number_of_employees'   => '51-200',
            'contact_number'        => '09722395762',
            'postal_code'           => '1200',
            'website'               => 'www.orangebrowntech.com',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Formal',
            'language'              => 'Filipino, English, Mandarin',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'Orange and Brown Technologies, Inc.',
            'industry'              => 'Computer/Information Technology (Software)'
        ]);

        Company::create([
            'company_logo_path'     => 'img/companies/mitsubishi.png',
            'address'               => 'Muntinlupa',
            'company_email'         => 'mitsbishimotors@example.com',
            'description'           => 'Mitsubishi Corporation (MC) is a global integrated business enterprise that develops and operates businesses together with its offices and subsidiaries in approximately 90 countries and regions worldwide, as well as a global network of around 1,400 group companies.',
            'registration_number'   => '5477-9722',
            'number_of_employees'   => '501-1000',
            'contact_number'        => '09667212890',
            'postal_code'           => '0892',
            'website'               => 'www.mitsubishi-motors.com',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Formal',
            'language'              => 'Filipino, English, Mandarin, Spanish, French',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'Mitsubishi Motors, Inc.',
            'industry'              => 'Automobile/Automotive Ancillary/Vehicle'
        ]);

        Company::create([
            'company_logo_path'     => 'img/companies/toyota.png',
            'address'               => 'Marikina City',
            'company_email'         => 'toyotamotors0@example.com',
            'description'           => 'Toyota Motor Corporation is a Japanese multinational automotive manufacturer headquartered in Toyota, Aichi, Japan. In 2017, Toyota\'s corporate structure consisted of 364,445 employees worldwide and, as of December 2019, was the tenth-largest company in the world by revenue.',
            'registration_number'   => '5917-7735',
            'number_of_employees'   => '1001-2000',
            'contact_number'        => '096679212890',
            'postal_code'           => '0811',
            'website'               => 'www.toyota-motors.com',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Formal',
            'language'              => 'Filipino, English, Mandarin, Spanish, Japanese',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'Toyota Motors, Inc.',
            'industry'              => 'Automobile/Automotive Ancillary/Vehicle'
        ]);

        Company::create([
            'company_logo_path'     => 'img/companies/sutherland.png',
            'address'               => 'Taguig City',
            'company_email'         => 'sutherland@example.com',
            'description'           => 'TAs a process transformation company, Sutherland rethinks and rebuilds processes for the digital age by combining the speed and insight of design thinking with the scale and accuracy of data analytics. We have been helping customers, across industries from financial services to health care, achieve greater agility through transformed and automated customer experiences for over 30 years.
            Headquartered in Rochester, N.Y., Sutherland employs thousands of professionals spanning 19 countries around the world.',
            'registration_number'   => '5237-6655',
            'number_of_employees'   => '1001-2000',
            'contact_number'        => '0997155424',
            'postal_code'           => '0811',
            'website'               => 'www.sutherlandsglobal.com',
            'benefits'              => 'SSS, VL, SL',
            'dress_code'            => 'Smart Casual',
            'language'              => 'Filipino, English, Japanese',
            'working_hours'         => 'Regular hours, Mondays - Fridays',
            'company_name'          => 'Sutherland',
            'industry'              => 'Call Center/IT-Enabled Services/BPO'
        ]);
    }
}
