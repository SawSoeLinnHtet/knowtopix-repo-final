<?php

namespace Database\Factories;

use App\Models\Enums\PostTypes;
use App\Models\Enums\StatusTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'content_area' => implode(" ", $this->faker->paragraphs()),
            'privacy' => PostTypes::PUBLIC,
            'status' => StatusTypes::ACTIVE
        ];
    }
}
