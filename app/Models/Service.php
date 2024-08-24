<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_type',
        'description',
        'price',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function imageables()
    {
        return $this->hasMany(Imageable::class, 'resourceable_id')->where('resourceable_type', Service::class);
    }
}
