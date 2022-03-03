<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProcess extends Model
{
    use HasFactory;

    protected $table = 'payment_process';

    protected $fillable = [
        'order_id',
        'request_id',
        'process_url',
        'reference'
    ];

    protected $casts = [
        'order_id' => 'integer',
        'request_id' => 'integer',
        'process_url' => 'string',
        'reference' => 'string'
    ];

    protected $with = [
        'order'
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
