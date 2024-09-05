<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'service_name'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function restaurantServices()
    {
        return $this->hasMany(RestaurantService::class,'service_id');
    }

    public function imageables()
    {
        return $this->hasMany(Imageable::class, 'resourceable_id')->where('resourceable_type', Service::class);
    }
}
