<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_store()
    {
        Product::create([
            'name' => 'test',
            'description' => 'test',
            'price' => 10000,
            'active' => true,
            'photo' => ''
        ]);
        $products = Product::all();
        $this->assertCount(1, $products);
    }

    public function test_delete()
    {
        $product = Product::create([
            'name' => 'test',
            'description' => 'test',
            'price' => 10000,
            'active' => true,
            'photo' => ''
        ]);
        Product::destroy($product->id);
        $products = Product::all();
        $this->assertCount(0, $products);
    }
}
