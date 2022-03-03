<?php

/**
 * @description Class for the management of rejected payments
 */

namespace App\BaseRepo\Checkout\PayStatus;

class PayStatusRejected implements PayStatusInterface
{
    public function validate($order, $response, $paymentProcess)
    {
        $status = 2;
        $order->status = 'REJECTED';
        $order->save();
        $message = $response->status()->message();
        $processUrl = $paymentProcess->process_url;
        return view('pages.checkout-status', compact('status', 'order', 'message', 'processUrl'));
    }
}
