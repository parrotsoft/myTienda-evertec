<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentProcess;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use function App\Helpers\getRequest;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $orders = Order::all();
            return view('pages.orders-list', compact('orders'));
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

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
            $order = Order::find($id);
            return view('pages.checkout', compact('order'));
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $placetopay = \App\Helpers\placetopay();

            $reference = $request->get('order_id');
            $order = Order::find($reference)->first();
            $requestPlaceToPay = getRequest($order);

            $response = $placetopay->request($requestPlaceToPay);

            if ($response->isSuccessful()) {
                PaymentProcess::create([
                    'order_id' => $reference,
                    'request_id' => $response->requestId(),
                    'process_url' => $response->processUrl(),
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $paymentProcess = PaymentProcess::where('order_id', '=', $id)->first();
            if ($paymentProcess) {
                $placetopay = \App\Helpers\placetopay();
                $response = $placetopay->query($paymentProcess->request_id);
                $order = Order::find($id);

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
                            return view('pages.checkout-status', compact('status', 'order', 'message'));
                            // print_r($paymentProcess->request_id . " PAYMENT PENDING\n");
                        }
                    }
                } else {
                    // There was some error with the connection so check the message
                    print_r($response->status()->message() . "\n");
                }
            } else {
                abort(404);
            }
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
