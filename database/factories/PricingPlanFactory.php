<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PricingPlanFactory extends Factory
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
            'price' => rand(100,500),
            'description' => $this->faker->text(100),
            'features' =>$this->faker->text(400),
        ];
    }
}
