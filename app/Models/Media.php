<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'extension'
    ];

    public function getPath(): array
    {
        $array = [];
        $imageSizes = config('media.images');
        foreach ($imageSizes as $imageSize) {
            $array[$imageSize['name']] =  asset('storage/uploads/images/' . $imageSize['name']) . '/' . $this->name;
        }
        return $array;
    }

    public function imageable()
    {
        return $this->hasOne(Imageable::class, 'media_id');
    }

}
