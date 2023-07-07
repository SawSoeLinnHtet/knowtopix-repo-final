<?php

namespace Database\Seeders;

use App\Models\Site\Post;
use App\Models\Staff;
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
        \App\Models\User::factory(10)->create();
        // Staff::factory(20)->create();
        // Post::factory(30)->create();
    }
}
