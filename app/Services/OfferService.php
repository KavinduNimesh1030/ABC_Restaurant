<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Service;
use App\Repositories\interfaces\OfferRepositoryInterface;
use Exception;

class OfferService
{
  public function __construct(private OfferRepositoryInterface $offerRepositoryInterface )
  {
  }

  public function getAll()
  {
    return $this->offerRepositoryInterface->getAll();
  }

  public function store(array $data)
  {
    try{
      return $this->offerRepositoryInterface->store($data);
    }catch(Exception $e){
      dd($e->getMessage());
    }
  }

  public function findById(string $id)
  {
    return $this->offerRepositoryInterface->findById($id);
  }

  public function update(array $data, $id)
  {
    try{
      return $this->offerRepositoryInterface->update($data,$id);
    }catch(Exception $e){
      dd($e->getMessage());
    }
     
  }

  public function delete(string $id)
  {

    $this->offerRepositoryInterface->delete($id);
  }

}
