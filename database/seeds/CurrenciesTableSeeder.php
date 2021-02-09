<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();
        Currency::create(['name' => 'PHP - ₱']);
        Currency::create(['name' => 'USD - $']);
        Currency::create(['name' => 'JPY - ¥']);
    }
}
