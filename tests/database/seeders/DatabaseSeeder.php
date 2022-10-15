<?php

namespace Database\Seeders;

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
        \App\Models\Books::factory(100)->create();
        \App\Models\Roles::factory(10)->create();
        \App\Models\Comments::factory(200)->create();
        \App\Models\Likes::factory(500)->create();
        \App\Models\Favorites::factory(10)->create();
        \App\Models\UserRoles::factory(10)->create();
    }
}
