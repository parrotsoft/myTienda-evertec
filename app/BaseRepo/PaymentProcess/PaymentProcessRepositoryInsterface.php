<?php

/**
 * @description Basic operations interface for PaymentProcess
 */

namespace App\BaseRepo\PaymentProcess;

use App\BaseRepo\Base\RepositoryInterface;

interface PaymentProcessRepositoryInsterface extends RepositoryInterface
{
    public function findByAttributes(array $attributes);
}
