<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\PaymentProcess;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class PaymentProcessTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_payment_process_has_one_order()
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

        $paymentProcess = PaymentProcess::create([
            'order_id' => $order->id,
            'request_id' => rand(1, 10),
            'process_url' => Str::random(40),
            'reference' => Str::random(40)
        ]);

        $this->assertInstanceOf(Order::class, $paymentProcess->order);
    }
}
