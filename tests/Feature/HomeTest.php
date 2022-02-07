<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_visit_page_of_home()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('home');
    }

    public function test_list_of_products_in_home()
    {
        Product::factory()->count(3)->create();
        $response = $this->get('/')
            ->assertOk();
        $products = Product::all();
        $response->assertViewHas('products', $products);
    }

}
