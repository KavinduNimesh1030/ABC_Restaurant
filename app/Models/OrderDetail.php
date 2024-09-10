<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'address',
        'phone_number',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
