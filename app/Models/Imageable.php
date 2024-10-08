<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageable extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'resourceable_id',
        'resourceable_type',
        'position',

    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'resourceable_id')->where('resourceable_type', Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'resourceable_id')->where('resourceable_type', Product::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Product::class, 'resourceable_id')->where('resourceable_type', Restaurant::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }


}
