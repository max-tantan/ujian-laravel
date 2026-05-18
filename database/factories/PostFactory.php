<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ??
                \App\Models\User::factory(),
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraph(4)
        ];
}
}