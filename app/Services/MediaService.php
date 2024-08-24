<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class MediaService
{
    public function storeImages($file)
    {
      $sizes = config('media.images');
      $imageName = time() . "_" . uniqid() . "." . $file->getClientOriginalExtension();
      $extension = $file->getClientOriginalExtension();
  
      foreach ($sizes as $key => $value) {
        Storage::makeDirectory('public/uploads/images/' . $key . '/path');
        Image::make($file)->save(public_path('storage/uploads/images/' . $key . '/' . $imageName), $value['quality']);
      }
  
      return $this->storeMediaInDatabase($imageName, $extension);
    }
  
    private function storeMediaInDatabase($name, $extension)
    {
      $data = [
        'name' => $name,
        'extension' => $extension
      ];
      return Media::create($data);
    }

}
