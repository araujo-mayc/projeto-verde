<?php

namespace Database\Seeders;

use App\Models\AdProduct;
use App\Models\City;
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

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        AdProduct::factory(20)->create(['user_id' => $user->id]);
        
        City::factory(10)->create();
    }
}
