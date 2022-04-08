<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => 'Test',
            'customer_email' => 'Test',
            'customer_mobile' => 'Test',
            'status' => 'CREATED',
            'product_id' => null,
            'customer_address' => 'Test'
        ];
    }
}
