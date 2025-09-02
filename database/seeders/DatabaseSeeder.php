<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);




          Currency::create([
            'code'=>'cfa',
            'local_name'=>'Francs CFA',
            'full_name'=>'Francs CFA'
        ]);

        Currency::create([
            'code'=>'cedis',
            'local_name'=>'Ghana Cedis',
            'full_name'=>'Ghana Cedis'
        ]);



        Language::create([
            'code'=>'fr',
            'local_name'=>'Francais',
            'full_name'=>'Francais',
            'charset'=>'utf-8',
            'direction'=>'ltr',
            'date_format'=>'d F Y'
        ]);

        Language::create([
            'code'=>'en',
            'local_name'=>'Anglais',
            'full_name'=>'Anglais',
            'charset'=>'utf-8',
            'direction'=>'ltr',
            'date_format'=>'d F Y'
        ]);


        Country::create([
            'code'=>'bf',
            'local_name'=>'Burkina Faso',
            'full_name'=>'Burkina Faso',
            'flag_img'=>'bf.png',
            'phone_code'=>226,
            'currency_id'=>1,
            'language_id'=>1
        ]);



        Country::create([
            'code'=>'ci',
            'local_name'=>'Cote d\'Ivoire',
            'full_name'=>'Cote d\'Ivoire',
            'flag_img'=>'ci.png',
            'phone_code'=>225,
            'currency_id'=>1,
            'language_id'=>1
        ]);
    }
}
