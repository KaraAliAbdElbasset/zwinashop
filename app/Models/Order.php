<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name','email','address','phone','total_price','total_qty','state','wilaya','commune'
    ];

    protected $appends = ['name'];

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'order_details')
            ->using(OrderDetail::class)
            ->withPivot(['qty','price','total','attributes'])
            ->withTimestamps();
    }
}
