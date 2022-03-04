<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::factory()
            ->count(30)
            ->create()
            ->each(function($product) {
                Order::factory(2, )->create([
                    'product_id' => $product->id
                ]);
            });
    }
}
