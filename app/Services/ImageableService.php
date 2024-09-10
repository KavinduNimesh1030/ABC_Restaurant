<?php

namespace App\Services;

use App\Models\Imageable;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class ImageableService
{
  public function store(string $imageId, $resourceableId,  $model, string $position)
  {
    return Imageable::updateOrCreate(
        [
            'resourceable_id' => $resourceableId,
            'resourceable_type' => $model,
            'position' => $position
        ],
        [
            'media_id' => $imageId
        ]
    );
  }

  public function find(string $resourcableId, string $model, string $position)
  {
    return Imageable::where('resourcable_id',$resourcableId)->where('resourceable_type',$model)->where('position',$position)->first();
  }

  
}
