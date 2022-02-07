<?php

namespace Tests\Unit;


use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{

    use RefreshDatabase;

    public function test_a_order_has_one_product()
    {
        Product::factory()->count(1)->create();
        $product = Product::first();

        $order = Order::create([
            'customer_name' => 'Miguel Lopez A',
            'customer_email' => 'lopezarizamiguel@gmail.com',
            'customer_mobile' => '3015575931',
            'product_id' => $product->id,
            'customer_address' => 'Carrera 9D # 124-248 Torre 5 Apt 805'
        ]);
        $this->assertInstanceOf(Product::class, $order->product);
    }
}
