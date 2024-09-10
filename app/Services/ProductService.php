<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Service;
use App\Repositories\interfaces\ProductRepositoryInterface;
use Exception;

class ProductService
{
  public function __construct(private ProductRepositoryInterface $productRepositoryInterface  ,private MediaService $mediaService, private ImageableService $imageableService)
  {
  }

  public function getAll()
  {
    return $this->productRepositoryInterface->getAll();
  }

  public function store(array $data)
  {
    try{
      $media = $this->mediaService->storeImages($data['image']);
      $product = $this->productRepositoryInterface->store($data);
      $this->imageableService->store($media['id'], $product['id'], Product::class, 'Feature');
    }catch(Exception $e){
      dd($e->getMessage());
    }
  }

  public function findById(string $id)
  {
    return $this->productRepositoryInterface->findById($id);
  }

  public function update(array $data, $id)
  {
      $media = $this->mediaService->storeImages($data['image']);
      unset($data['image']);
      $this->imageableService->store($media['id'], $id, Product::class, 'Feature');
      return $this->productRepositoryInterface->update($data,$id);
  }

  public function delete(string $id)
  {
    
    $this->productRepositoryInterface->delete($id);
  }

}
