<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [[
            'id' => 1,
            'name' => 'admin',

        ],[
        'id' => 2,
        'name' => 'user']
    ];
    }
}
