<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'designation' => $this->faker->word,
            'review' => $this->faker->text(100),
            'image' => 'https://picsum.photos/200/300',
        ];
    }
}
