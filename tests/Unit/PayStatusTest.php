<?php

namespace Tests\Unit;


use App\BaseRepo\Checkout\Response;
use App\Models\Order;
use App\Models\PaymentProcess;
use Dnetix\Redirection\Entities\Status;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;
use \App\BaseRepo\Checkout\PayStatus;

class PayStatusTest extends TestCase
{
    public function test_exception()
    {
        $this->expectException(NotFoundHttpException::class);
        $payStatus = new PayStatus();
        $payStatus->initialize(new Status([]), new Order(), new Response(), new PaymentProcess());
    }

}
