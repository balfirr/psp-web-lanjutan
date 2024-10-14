<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        User::create([
            'name' => 'Dzakwan Irfan Ramdhani',
            'email' => 'dzakwan@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Malika Azra Permata',
            'email' => 'malika@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        Category::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'nama' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'nama' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();
    }
}
