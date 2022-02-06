<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(50),
            'price' => $this->faker->numberBetween($min = 10000, $max = 100000),
            'active' => true,
            'photo' => $this->faker->imageUrl($width = 500, $height = 350)
        ];
    }
}
