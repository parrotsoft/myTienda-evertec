<?php

/**
 * @description Class to store the Payment Process
 */

namespace App\BaseRepo\Checkout;

use App\BaseRepo\PaymentProcess\PaymentProcessRepositoryInsterface;
use App\Models\PaymentProcess;
use Exception;

class CheckoutRepository
{
    protected $paymentProcessRepository;

    public function __construct(PaymentProcessRepositoryInsterface $paymentProcessRepository)
    {
        $this->paymentProcessRepository = $paymentProcessRepository;
    }

    public function storePaymentProcess($orderId, $response, $reference): PaymentProcess
    {
        try {
            return $this->paymentProcessRepository->create([
                'order_id' => $orderId,
                'request_id' => $response->requestId(),
                'process_url' => $response->processUrl(),
                'reference' => $reference
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
