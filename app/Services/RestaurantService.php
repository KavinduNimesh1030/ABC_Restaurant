<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\RestaurantService as ModelsRestaurantService;
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

  private function updateRestaurantServices(string $data, string $restaurant_id)
  {
   try{
    ModelsRestaurantService::where('restaurant_id',$restaurant_id)->delete();
   $this->storeRestaurantServices($data, $restaurant_id);
   }catch(Exception $e){
    dd($e->getMessage());
   }
  }

  public function findById(string $id)
  {
    return $this->restaurantRepositoryInterface->findById($id);
  }

  public function update(array $data, $id)
  {
      try{
        $services_ids = $data['services_ids'];
        $media = $this->mediaService->storeImages($data['image']);
        unset($data['services_ids']);
        unset($data['image']);
        $this->restaurantRepositoryInterface->update($data, $id);
        $this->updateRestaurantServices($services_ids,$id);
        $this->imageableService->store($media['id'], $id, Restaurant::class, 'Feature');
      }catch(Exception $e){
        dd($e->getMessage());
      }
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
