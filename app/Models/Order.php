<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status',
        'product_id'
    ];

    protected $casts = [
        'customer_name' => 'string',
        'customer_email' => 'string',
        'customer_mobile' => 'string',
        'status' => 'string',
        'product_id' => 'integer'
    ];

    protected $with = [
      'product'
    ];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
