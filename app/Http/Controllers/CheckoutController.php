<?php

namespace App\Http\Controllers;

use App\BaseRepo\Checkout\CheckoutRepository;
use App\BaseRepo\Checkout\PayStatusFactory;
use App\BaseRepo\Order\OrderRepositoryInterface;
use App\BaseRepo\PaymentProcess\PaymentProcessRepositoryInsterface;
use Exception;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{

    protected $placetopay;
    protected $orderRepository;
    protected $paymentProcessRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, PaymentProcessRepositoryInsterface $paymentProcessRepository)
    {
        $this->placetopay = getPlacetopay();
        $this->orderRepository = $orderRepository;
        $this->paymentProcessRepository = $paymentProcessRepository;
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
            $order = $this->orderRepository->find($id);
            return view('pages.checkout', compact('order'));
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
    public function store(Request $request)
    {
        try {
            $orderId = $request->get('order_id');
            $order = $this->orderRepository->find($orderId);
            $requestPlaceToPay = getRequestToPlacetopay($order);
            $reference = $requestPlaceToPay['payment']['reference'];
            $response = $this->placetopay->request($requestPlaceToPay);

            if ($response->isSuccessful()) {
                if ((new CheckoutRepository($this->paymentProcessRepository))->storePaymentProcess($orderId, $response, $reference)) {
                    return redirect()->away($response->processUrl());
                }
            } else {
                abort(400, $response->status()->message());
            }
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return PayStatusFactory|\App\BaseRepo\Checkout\PayStatusPending|\App\BaseRepo\Checkout\PayStatusRejected|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($reference)
    {
        try {
            $paymentProcess = $this->paymentProcessRepository->findByAttributes(['reference' => $reference]);

            if ($paymentProcess) {
                $response = $this->placetopay->query($paymentProcess->request_id);
                $order = $paymentProcess['order'];

                if ($response->isSuccessful()) {
                    return (new PayStatusFactory())->initialize($response->status(), $order, $response, $paymentProcess);
                } else {
                    abort(500, $response->status()->message());
                }
            } else {
                abort(404);
            }
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

}
