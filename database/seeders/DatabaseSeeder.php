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
        // User::factory(10)->create();

        User::create([
            'name' => 'Iqbal Firmansyah',
            'email' => 'iqbal@hotmail.com',
            'password' => bcrypt(value: '12345678')
        ]);


        Category::create([
            'nama' => 'Web design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'nama' => 'Personal',
            'slug' => 'personal',
        ]);

        Category::create([
            'nama' => 'Web programming',
            'slug' => 'web-programming',
        ]);

        Post::factory(20)->create();
    }

}
