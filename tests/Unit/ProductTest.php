<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected $product;

    public function setUp(): void
    {
        parent::setUp();
        $this->product = Product::create([
            'name' => 'test',
            'description' => 'test',
            'price' => 10000,
            'active' => true,
            'photo' => ''
        ]);
    }

    public function test_store()
    {
        $products = Product::all();
        $this->assertCount(1, $products);
    }

    public function test_delete()
    {
        Product::destroy($this->product->id);
        $products = Product::all();
        $this->assertCount(0, $products);
    }
}
