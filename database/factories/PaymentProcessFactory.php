<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => 1,
            'request_id' => $this->faker->numberBetween(1, 10),
            'process_url' => $this->faker->url,
            'reference' => $this->faker->uuid
        ];
    }
}
