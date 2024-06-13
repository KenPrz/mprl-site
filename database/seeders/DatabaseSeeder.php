<?php

namespace Database\Seeders;

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

        $this->call([
            RoleSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mprl.com',
            'password' => '123123123',
            'role_id' => 1
        ]);

        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@mprl.com',
            'password' => '123123123',
            'role_id' => 2
        ]);
        $this->call([
            CategorySeeder::class,
            BlogPostSeeder::class,
            BlogImageSeeder::class,
        ]);

    }
}
