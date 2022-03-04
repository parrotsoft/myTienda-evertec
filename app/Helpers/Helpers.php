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
        'login' => env('P2P_LOGIN'),
        'tranKey' => env('P2P_TRANKEY'),
        'baseUrl' => env('P2P_URL')
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
        'ipAddress' => env('IP_ADDRESS'),
        'cancelUrl' => env('APP_URL').'/orders/checkout/status/' . $reference,
        'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
    ];
}


function getUrlStatusVerify(Order $order)
{
    if ($order->status == 'CREATED') {
        return "<a target='_black' class='btn btn-info btn-sm ml-1' href='".$order->paymentProcess->process_url."'>Consultar</a>";
    }
}
