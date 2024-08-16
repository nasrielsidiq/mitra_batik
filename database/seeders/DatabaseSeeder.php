<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
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
            'username' => 'muca',
            'email' => 'muca@admin.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true
        ]);

        User::factory(9)->create();
        Seller::factory(10)->create();
        Type::factory(20)->create();
        Item::factory(50)->create();

    }
}
