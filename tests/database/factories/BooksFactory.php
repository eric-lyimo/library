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
            'name' => $this->faker->title(),
            'publisher' => $this->faker->name(),
            'year' => $this->faker->date(),
        ];
    }
}
