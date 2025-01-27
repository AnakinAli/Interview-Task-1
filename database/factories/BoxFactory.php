<?php

namespace Database\Factories;

use App\Enums\Colors;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoxFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'url'   => fake()->url,
            'color' => fake()->randomElement([Colors::BLUE, Colors::GREEN, Colors::RED]),
        ];
    }

    public function default(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'url'   => null,
                'color' => null,
            ];
        });
    }
}
