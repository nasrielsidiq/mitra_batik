<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\PaymentType;
use App\Models\Seller;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Muca',
            'username' => 'muca_admin',
            'email' => 'muca@admin.com',
            'phone_number' => fake()->phoneNumber(),
            'password' => bcrypt('12345678'),
            'is_banned' => false,
            'is_admin' => true
        ]);
        User::create([
            'name' => 'Muca',
            'username' => 'muca_user',
            'email' => 'muca@user.com',
            'phone_number' => fake()->phoneNumber(),
            'password' => bcrypt('12345678'),
            'is_banned' => false,
            'is_admin' => false
        ]);

        User::factory(9)->create();
        Type::factory(20)->create();
        Item::factory(50)->create();
        PaymentType::factory(11)->create();
        
    }
}
