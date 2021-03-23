<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetail extends Pivot
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $table = ['order_details'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
        'total',
        'attributes'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'price' => 'float',
        'total' => 'float',
        'attributes' => 'array'
    ];
}
