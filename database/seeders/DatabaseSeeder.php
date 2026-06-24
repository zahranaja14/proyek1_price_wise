<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> 319262988641d4c273e1d24f8892db696a9c9cc7
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
=======
    use WithoutModelEvents;

>>>>>>> 319262988641d4c273e1d24f8892db696a9c9cc7
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // Seed default categories
        $categories = ['Jaket', 'T-shirt', 'Sepatu'];
        foreach ($categories as $name) {
            \App\Models\Category::firstOrCreate(['name' => $name]);
        }

        // Seed a default test user if it doesn't exist
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'role' => 'buyer',
            ]);
        }
=======
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
>>>>>>> 319262988641d4c273e1d24f8892db696a9c9cc7
    }
}
