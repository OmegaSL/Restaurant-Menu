<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'phone' => '0248429877',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'role' => 'super-admin',
        ]);
        \App\Models\User::factory(4)->create();
        \App\Models\MenuCategory::factory(5)->create();
        \App\Models\MenuItem::factory(30)->create();
        \App\Models\ExpenseCategory::factory(15)->create();
        \App\Models\Expense::factory(60)->create();
        \App\Models\Order::factory(15)->create();
        \App\Models\OrderList::factory(60)->create();
        \App\Models\Reservation::factory(5)->create();
        \App\Models\Setting::create([
            "site_name" => "Restaurant",
            "site_description" => "Restaurant",
            "site_logo" => null,
            "site_favicon" => null,
            "site_address" => "Accra, Ghana",
            "site_email" => "admin@admin.com",
            "site_phone" => "0248429877",
            "products_discount_percent" => 0,
            "products_tax_percent" => 0,
            "site_facebook_link" => "https://facebook.com",
            "site_twitter_link" => "https://twitter.com",
            "site_instagram_link" => "https://instagram.com",
            "site_linkedin_link" => "https://linkedin.com",
            "site_youtube_link" => "https://youtube.com",
            "site_whatsapp_number" => "0248429877",
        ]);
    }
}
