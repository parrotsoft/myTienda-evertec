<?php

namespace App\Http\Controllers;

use App\BaseRepo\Order\OrderRepositoryInterface;
use App\BaseRepo\PaymentProcess\PaymentProcessRepositoryInsterface;
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
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        try {
            $order = $this->orderRepository->find($id);
            return view('pages.checkout', compact('order'));
        } catch (\Exception $e) {
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

            $response = $this->placetopay->request($requestPlaceToPay);

            if ($response->isSuccessful()) {
                $this->paymentProcessRepository->create([
                    'order_id' => $orderId,
                    'request_id' => $response->requestId(),
                    'process_url' => $response->processUrl(),
                    'reference' => $requestPlaceToPay['payment']['reference']
                ]);
                return redirect()->away($response->processUrl());
            } else {
                abort(400, $response->status()->message());
            }
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($reference)
    {
        try {
            $paymentProcess = $this->paymentProcessRepository->findByAttributes(['reference' => $reference]);

            if ($paymentProcess) {
                $response = $this->placetopay->query($paymentProcess->request_id);
                $order = $paymentProcess['order'];

                if ($response->isSuccessful()) {
                    if ($response->status()->isApproved()) {
                        $status = 1;
                        $order->status = 'PAYED';
                        $order->save();
                        return view('pages.checkout-status', compact('status', 'order'));
                    } else {
                        if ($response->status()->isRejected()) {
                            $status = 2;
                            $order->status = 'REJECTED';
                            $order->save();
                            $message = $response->status()->message();
                            $processUrl = $paymentProcess->process_url;
                            return view('pages.checkout-status', compact('status', 'order', 'message', 'processUrl'));
                        } else {
                            // Is pending so make a query for it later (see information.php example)
                            $message = $response->status()->message();
                            $status = 3;
                            $processUrl = $paymentProcess->process_url;
                            return view('pages.checkout-status', compact('status', 'order', 'message', 'processUrl'));
                        }
                    }
                } else {
                    // There was some error with the connection so check the message
                    abort(500, $response->status()->message());
                }
            } else {
                abort(404);
            }
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
    }

}
