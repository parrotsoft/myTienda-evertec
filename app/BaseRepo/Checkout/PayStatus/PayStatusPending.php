<?php

namespace App\BaseRepo\Checkout\PayStatus;

class PayStatusPending implements PayStatusInterface
{

    public function validate($order, $response, $paymentProcess)
    {
        $message = $response->status()->message();
        $status = 3;
        $processUrl = $paymentProcess->process_url;
        return view('pages.checkout-status', compact('status', 'order', 'message', 'processUrl'));
    }
}
