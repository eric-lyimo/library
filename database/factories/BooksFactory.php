<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->name(),
            'name' => $this->faker->unique()->words(3, true),
            'publisher' => $this->faker->unique()->company(),
            'year' => $this->faker->date(),
        ];
    }
}
