<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'reservation_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'resourceable_id')->where('resourceable_type', Reservation::class);
    }

    public function reservationDetail()
    {
        return $this->hasOne(ReservationDetail::class,'reservation_id');
    }
}
