<?php

namespace App\Helpers;

use App\Models\Order;
use Dnetix\Redirection\PlacetoPay;

function placetopay()
{
    return new PlacetoPay([
        'login' => env('P2P_LOGIN', '6dd490faf9cb87a9862245da41170ff2'),
        'tranKey' => env('P2P_TRANKEY', '024h1IlD'),
        'baseUrl' => env('P2P_URL', 'https://dev.placetopay.com/redirection/')
    ]);
}

function getRequest(Order $order)
{
    $reference =  'ORDER_'. time();
    return [
        'payment' => [
            'reference' => $reference,
            'description' => $order->product->name,
            'amount' => [
                'currency' => 'COP',
                'total' => $order->product->price,
            ],
        ],
        'expiration' => date('c', strtotime(' + 2 days')),
        'returnUrl' => 'http://localhost:8000/orders/checkout/status/' . $reference,
        'ipAddress' => '127.0.0.1',
        'cancelUrl' => 'http://localhost:8000',
        'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
    ];
}
