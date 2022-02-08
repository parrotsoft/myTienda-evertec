<?php

use App\Models\Order;
use Dnetix\Redirection\PlacetoPay;

/**
 * @description return instance of PlacetoPay
 * @return PlacetoPay
 */

function getPlacetopay(): PlacetoPay
{
    return new PlacetoPay([
        'login' => env('P2P_LOGIN', '6dd490faf9cb87a9862245da41170ff2'),
        'tranKey' => env('P2P_TRANKEY', '024h1IlD'),
        'baseUrl' => env('P2P_URL', 'https://dev.placetopay.com/redirection/')
    ]);
}

/**
 * @description return request to Placetopay
 * @param Order $order
 * @return array
 */

function getRequestToPlacetopay(Order $order): array
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
        'returnUrl' => env('APP_URL').'/orders/checkout/status/' . $reference,
        'ipAddress' => '127.0.0.1',
        'cancelUrl' => env('APP_URL').'/orders/checkout/status/' . $reference,
        'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
    ];
}
