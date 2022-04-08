<?php

namespace App\BaseRepo\Checkout;

class Response
{
    public function status()
    {
        return $this;
    }

    public function message()
    {
        return 'Hola';
    }
}
