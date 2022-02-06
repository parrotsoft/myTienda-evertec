<?php

namespace App\BaseRepo\PaymentProcess;

use App\BaseRepo\Base\RepositoryInterface;

interface PaymentProcessRepositoryInsterface extends RepositoryInterface
{

    public function findByAttributes(array $attributes);

}
