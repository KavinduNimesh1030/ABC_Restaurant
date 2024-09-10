<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantService extends Model
{
    use HasFactory;

    protected $fillable = [
       'service_id',
        'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
 

}
