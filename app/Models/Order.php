<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function orderDetail()
    {
        return $this->hasOne(OrderDetail::class,'order_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'resourceable_id')->where('resourceable_type', Order::class);
    }
}
