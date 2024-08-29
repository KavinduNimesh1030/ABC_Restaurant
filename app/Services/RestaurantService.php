<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\Service;
use App\Repositories\interfaces\RestaurantRepositoryInterface;
use Dotenv\Util\Str;
use Exception;
use PhpParser\Node\Expr\Cast\String_;

class RestaurantService
{
  public function __construct(private RestaurantRepositoryInterface $restaurantRepositoryInterface  ,private MediaService $mediaService, private ImageableService $imageableService)
  {
  }

  public function getAll()
  {
    return $this->restaurantRepositoryInterface->getAll();
  }

  public function store(array $data)
  {
    try{
      $media = $this->mediaService->storeImages($data['image']);
      $restaurant = $this->restaurantRepositoryInterface->store($data);
      $this->storeRestaurantServices($data['services_ids'],$restaurant->id);
      unset($data['services_ids']);
      $this->imageableService->store($media['id'], $restaurant['id'], Restaurant::class, 'Feature');
    }catch(Exception $e){
      dd($e->getMessage());
    }
  }

  private function storeRestaurantServices(string $data, string $restaurant_id)
  {
    $services  = $this->formatAsArray($data);
    foreach ($services as $serviceId) {
      $this->restaurantRepositoryInterface->storeRestaurantServices(['service_id' => $serviceId, 'restaurant_id' => $restaurant_id]);
    }
  }

  public function findById(string $id)
  {
    return $this->restaurantRepositoryInterface->findById($id);
  }

  public function update(array $data, $id)
  {
      $media = $this->mediaService->storeImages($data['image']);
      unset($data['image']);
      $this->imageableService->store($media['id'], $id, Restaurant::class, 'Feature');
      return $this->restaurantRepositoryInterface->update($data,$id);
  }

  public function delete(string $id)
  {
    $this->restaurantRepositoryInterface->delete($id);
  }

  private function formatAsArray(string $data)
  {
    if (!is_array($data)) {
      $data = explode(',', $data);
    }
    return $data;
  }

}
