<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    // Fillable properties
    protected $fillable = [
        'reservation_id',
        'name',
        'email',
        'phone',
        'date',
        'attendents',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
