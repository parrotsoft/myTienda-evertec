<?php

namespace App\BaseRepo\Checkout\PayStatus;

class PayStatusApproved implements PayStatusInterface
{

    public function validate($order, $response, $paymentProcess)
    {
        $status = 1;
        $order->status = 'PAYED';
        $order->save();
        return view('pages.checkout-status', compact('status', 'order'));
    }
}
