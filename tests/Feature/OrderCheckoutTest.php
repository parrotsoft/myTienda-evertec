<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_visit_create_orders()
    {
        $product = Product::factory()->count(1)->create();
        $product = Product::first();
        $responser = $this->get('/orders/create/' . $product->id);
        $responser->assertOk();
    }

    public function test_product_in_create_orders()
    {
        Product::factory()->count(1)->create();
        $product = Product::first();
        $response = $this->get('/orders/create/' . $product->id);
        $response->assertOk();
        $response->assertViewHas('product', $product);
    }

    public function test_order_create()
    {
        $this->withoutMiddleware();
        Product::factory()->count(1)->create();
        $product = Product::first();
        $response = $this->post('orders/create', [
            '_token' => csrf_token(),
            'customer_name' => 'Miguel Lopez A',
            'customer_email' => 'lopezarizamiguel@gmail.com',
            'customer_mobile' => '3015575931',
            'product_id' => $product->id,
            'customer_address' => 'Carrera 9D # 124-248 Torre 5 Apt 805'
        ]);
        $order = Order::first();
        $response->assertStatus(302);
        $response->assertRedirect('/orders/checkout/' . $order->id);
    }

    public function test_produc_in_checkout_page()
    {
        Product::factory()->count(1)->create();
        $product = Product::first();
        $order = Order::create([
            '_token' => csrf_token(),
            'customer_name' => 'Miguel Lopez A',
            'customer_email' => 'lopezarizamiguel@gmail.com',
            'customer_mobile' => '3015575931',
            'product_id' => $product->id,
            'customer_address' => 'Carrera 9D # 124-248 Torre 5 Apt 805'
        ]);
        $order = $order->fresh();
        $response = $this->get('/orders/checkout/' . $order->id)
            ->assertOk();
        $response->assertViewHas('order', $order);

    }

}
