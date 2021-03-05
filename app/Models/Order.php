<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name','email','address','phone','total_price','total_qty','state','city','province'
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['qty','price','total'])->withTimestamps();
    }
}
