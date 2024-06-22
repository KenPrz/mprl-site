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
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@mprl.com',
            'password' =>bcrypt('123123123'),
            'role_id' => 1,
        ]);
        User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'email' => 'customer@mprl.com',
            'password' =>bcrypt('123123123'),
            'role_id' => 2,
        ]);
        $this->call([
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            BlogImageSeeder::class,
            ContactFormSeeder::class,
        ]);
    }
}
