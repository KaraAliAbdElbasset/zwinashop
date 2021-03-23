<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name','display_name'];


    public function values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
       return $this->hasMany(AttributeValue::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(AttributeProduct::class)
            ->withTimestamps();
    }
}
