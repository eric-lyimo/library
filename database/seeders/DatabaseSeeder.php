<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        \App\Models\Books::factory(5000)->create();
        // \App\Models\Roles::factory(10)->create();
        // \App\Models\Comments::factory(20)->create();
        // \App\Models\Likes::factory(500)->create();
        // \App\Models\Favorites::factory(10)->create();
        // \App\Models\UserRoles::factory(10)->create();
    }
}
