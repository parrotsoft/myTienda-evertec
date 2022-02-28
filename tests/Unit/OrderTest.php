<?php

namespace Tests\Unit;


use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{

    use RefreshDatabase;

    protected $product;

    public function setUp(): void
    {
        parent::setUp();
        Product::factory()->count(1)->create();
        $this->product = Product::first();
    }

    public function test_create_order()
    {
        $order = Order::create([
            'customer_name' => 'Miguel Lopez A',
            'customer_email' => 'lopezarizamiguel@gmail.com',
            'customer_mobile' => '3015575931',
            'product_id' => $this->product->id,
            'customer_address' => 'Carrera 9D # 124-248 Torre 5 Apt 805'
        ]);
        $this->assertInstanceOf(Order::class, $order);
        return $order;
    }

    /**
     * @depends test_create_order
     */
    public function test_a_order_has_one_product(Order $order)
    {
        $this->assertInstanceOf(Product::class, $order->product);
    }
}
