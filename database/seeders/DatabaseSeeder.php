<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Market\MarketCollectionCategory;
use App\Models\Market\MarketCollectionReportReason;
use App\Models\Market\MarketCollectionType;
use App\Models\Market\MarketProductCategory;
use App\Models\Market\MarketProductPaymentMethod;
use App\Models\Market\MarketProductReportReason;
use App\Models\Market\MarketProductType;
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





         // -----------------------------
        // Product Types
        // -----------------------------
        $productTypes = [
            ['slug' => 'electronics', 'label' => ['en' => 'Electronics', 'fr' => 'Électronique']],
            ['slug' => 'furniture', 'label' => ['en' => 'Furniture', 'fr' => 'Mobilier']],
        ];

        foreach ($productTypes as $type) {
            MarketProductType::updateOrCreate(['slug' => $type['slug']], $type);
        }

        // -----------------------------
        // Collection Types
        // -----------------------------
        $collectionTypes = [
            ['slug' => 'virtual_store', 'label' => ['en' => 'Virtual Store', 'fr' => 'Boutique Virtuelle']],
            ['slug' => 'event', 'label' => ['en' => 'Event', 'fr' => 'Événement']],
        ];

        foreach ($collectionTypes as $type) {
            MarketCollectionType::updateOrCreate(['slug' => $type['slug']], $type);
        }

        // -----------------------------
        // Product Categories
        // -----------------------------
        $productCategories = [
            ['slug' => 'smartphones', 'label' => ['en' => 'Smartphones', 'fr' => 'Smartphones'], 'parent_id' => null],
            ['slug' => 'laptops', 'label' => ['en' => 'Laptops', 'fr' => 'Ordinateurs Portables'], 'parent_id' => null],
            ['slug' => 'televisions', 'label' => ['en' => 'Televisions', 'fr' => 'Télévisions'], 'parent_id' => 1], // sous-catégorie de smartphones par exemple
        ];

        foreach ($productCategories as $cat) {
            MarketProductCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // -----------------------------
        // Collection Categories
        // -----------------------------
        $collectionCategories = [
            ['slug' => 'electronics_shop', 'label' => ['en' => 'Electronics Shop', 'fr' => 'Boutique Électronique'], 'parent_id' => null],
            ['slug' => 'furniture_shop', 'label' => ['en' => 'Furniture Shop', 'fr' => 'Boutique Mobilier'], 'parent_id' => null],
        ];

        foreach ($collectionCategories as $cat) {
            MarketCollectionCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // -----------------------------
        // Payment Methods
        // -----------------------------
        $paymentMethods = [
            ['slug' => 'cash', 'label' => ['en' => 'Cash', 'fr' => 'Espèces']],
            ['slug' => 'installments', 'label' => ['en' => 'Installments', 'fr' => 'Mensualités']],
        ];

        foreach ($paymentMethods as $method) {
            MarketProductPaymentMethod::updateOrCreate(['slug' => $method['slug']], $method);
        }



        // -----------------------------
        // Product Report Reasons
        // -----------------------------
        $productReportReasons = [
            ['slug' => 'fraud', 'label' => ['en' => 'Fraud', 'fr' => 'Fraude']],
            ['slug' => 'inappropriate', 'label' => ['en' => 'Inappropriate content', 'fr' => 'Contenu inapproprié']],
            ['slug' => 'spam', 'label' => ['en' => 'Spam', 'fr' => 'Spam']],
        ];

        foreach ($productReportReasons as $reason) {
            MarketProductReportReason::updateOrCreate(['slug' => $reason['slug']], $reason);
        }

        // -----------------------------
        // Collection Report Reasons
        // -----------------------------
        $collectionReportReasons = [
            ['slug' => 'fraud', 'label' => ['en' => 'Fraud', 'fr' => 'Fraude']],
            ['slug' => 'inappropriate', 'label' => ['en' => 'Inappropriate content', 'fr' => 'Contenu inapproprié']],
            ['slug' => 'spam', 'label' => ['en' => 'Spam', 'fr' => 'Spam']],
        ];

        foreach ($collectionReportReasons as $reason) {
            MarketCollectionReportReason::updateOrCreate(['slug' => $reason['slug']], $reason);
        }

        $this->command->info('Reference data seeded successfully!');
    }




}
