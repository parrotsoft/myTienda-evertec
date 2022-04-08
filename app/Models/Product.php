<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'active',
        'photo'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'active' => 'boolean',
        'photo' => 'string'
    ];
}
