<?php

namespace App\Services;

use App\Models\Service;
use App\Repositories\interfaces\ServiceRepositoryInterface;
use Exception;

class ServiceService
{
  public function __construct(private ServiceRepositoryInterface $serviceRepositoryInterface ,private MediaService $mediaService, private ImageableService $imageableService)
  {
  }

  public function getAll()
  {
    return $this->serviceRepositoryInterface->getAll();
  }

  public function store(array $data)
  {
      try{
        $media = $this->mediaService->storeImages($data['image']);
        $service = $this->serviceRepositoryInterface->store($data);
        $this->imageableService->store($media['id'], $service['id'], Service::class, 'Feature');
      }catch(Exception $e){
        dd($e->getMessage());
      }
  }

  public function findById(string $id)
  {
    return $this->serviceRepositoryInterface->findById($id);
  }

  public function update(array $data, $id)
  {
      $media = $this->mediaService->storeImages($data['image']);
      unset($data['image']);
      $this->imageableService->store($media['id'], $id, Service::class, 'Feature');
      return $this->serviceRepositoryInterface->update($data,$id);
  }

  public function delete(string $id)
  {
    $this->serviceRepositoryInterface->delete($id);
  }

}
