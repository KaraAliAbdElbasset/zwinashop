<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description', 'image','category_id','featured'
    ];

    protected $casts = ['featured' => 'boolean'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return isset($this->image) ? asset('storage/'.$this->image) : asset('assets/admin/dist/img/default-150x150.png');
    }
    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(self::class,'category_id','id')->withDefault(['name' => 'Main category']);
    }
    
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class);
    }

    public function scopeFeatured($q)
    {
        return $q->where('featured',true);
    }
}
