<?php

/**
 * @description Factory to abstract the result of a payment
 */

namespace App\BaseRepo\Checkout;

use App\BaseRepo\Checkout\PayStatus\PayStatusApproved;
use App\BaseRepo\Checkout\PayStatus\PayStatusPending;
use App\BaseRepo\Checkout\PayStatus\PayStatusRejected;

class PayStatus
{
    public function initialize($status, $order, $response, $paymentProcess)
    {
        switch ($status) {
            case $status->isApproved():
                return (new PayStatusApproved())->validate($order, $response, $paymentProcess);
            case $status->isRejected():
                return (new PayStatusRejected())->validate($order, $response, $paymentProcess);
            case $status->status() === 'PENDING':
                return (new PayStatusPending())->validate($order, $response, $paymentProcess);
            default:
                return abort(404, 'Estado desconocido');
        }
    }
}
