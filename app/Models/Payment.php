<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'resourceble_id',
        'resourceble_type',
        'user_id',
        'amount',
        'payment_date',
        'payment_method',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'resourceable_id')->where('resourceable_type', Order::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'resourceable_id')->where('resourceable_type', Reservation::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
