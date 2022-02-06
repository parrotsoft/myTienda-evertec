<?php

namespace App\BaseRepo\Checkout\PayStatus;

interface PayStatusInterface
{
    public function validate($order, $response, $paymentProcess);
}
