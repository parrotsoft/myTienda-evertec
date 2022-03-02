<?php

namespace App\Http\Controllers;

use App\BaseRepo\Product\ProductRepositoryInterface;


class HomeController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
        return view('home', compact('products'));
    }
}
