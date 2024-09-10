<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'promotion_description',
        'start_date',
        'end_date',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
