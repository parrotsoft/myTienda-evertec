<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    use RefreshDatabase;

    protected $product;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Product::factory()->count(1)->create();
        $this->product = Product::first();
    }

    public function test_get_request_to_p2p()
    {
        $order = Order::create([
            'customer_name' => 'Miguel Lopez A',
            'customer_email' => 'lopezarizamiguel@gmail.com',
            'customer_mobile' => '3015575931',
            'product_id' => $this->product->id,
            'customer_address' => 'Carrera 9D # 124-248 Torre 5 Apt 805'
        ]);
        $requer_p2p = getRequestToPlacetopay($order);
        $this->assertArrayHasKey('payment', $requer_p2p);
        $this->assertArrayHasKey('expiration', $requer_p2p);
        $this->assertArrayHasKey('returnUrl', $requer_p2p);
        $this->assertArrayHasKey('ipAddress', $requer_p2p);
        $this->assertArrayHasKey('cancelUrl', $requer_p2p);
        $this->assertArrayHasKey('userAgent', $requer_p2p);
    }
}