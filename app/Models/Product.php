<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function imageables()
    {
        return $this->hasMany(Imageable::class, 'resourceable_id')->where('resourceable_type', Product::class);
    }

    public function offer()
    {
        return $this->hasOne(Offer::class,'product_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }


}
