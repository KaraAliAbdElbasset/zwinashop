<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeProduct extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'attribute_id',
        'attribute_value_id',
        'attribute',
        'value',
        'price',
        'image',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : '';
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function value()
    {
        return $this->belongsTo(AttributeValue::class);
    }

}
