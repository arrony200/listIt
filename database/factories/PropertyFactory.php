<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
          //  'featured_image' => $this->faker->imageUrl($width = 640, $height = 480),
            'featured_image' => 'https://picsum.photos/800/500',
            'location_id' => Location::all()->random()->id,
            'price' => rand(1000,5000),
            'status' => rand(0,1),
            'type' => rand(0,2),
            'bedrooms' => rand(0,6),
            'bathrooms' => rand(0,5),
            'net_sqm' => rand(55,300),
            'gross_sqm' => rand(65,450),
            'pool' => rand(0,3),
            'overview' => $this->faker->text(100),
            'why_buy' => $this->faker->text(1000),
            'description' => $this->faker->text(500),
        ];
    }
}
