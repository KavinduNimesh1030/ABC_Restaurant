<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'description',
        'contact_info',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function queries()
    {
        return $this->hasMany(Query::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
