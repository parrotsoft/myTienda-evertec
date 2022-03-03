<?php

namespace App\Http\Controllers;

use App\BaseRepo\Order\OrderRepositoryInterface;
use App\BaseRepo\Product\ProductRepositoryInterface;
use App\Http\Requests\StoreOrderRequest;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $productRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        try {
            $date = $request->get('date') ? $request->get('date') : date('Y-m-d');
            $orders = $date ? $this->orderRepository->findByCreted($date) : $this->orderRepository->all();
            return view('pages.orders-list', compact('orders', 'date'));
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        try {
            $product = $this->productRepository->find($id);
            return view('pages.order-create', compact('product'));
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOrderRequest $request)
    {
        //
        try {
            $request->request->set('product_id', (int)$request->get('product_id'));
            $order = $this->orderRepository->create($request->all());
            return redirect()->route('orders.checkout.create', [$order]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

}
