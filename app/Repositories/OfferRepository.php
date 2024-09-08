<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Repositories\interfaces\OfferRepositoryInterface;

use Exception;

class OfferRepository implements OfferRepositoryInterface
{
    public function getAll()
    {
        return Offer::all();
    }

    public function store(array $data)
    {
        return Offer::create($data);
    }

    public function findById(string $id)
    {
        return Offer::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        Offer::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        Offer::where('id',$id)->delete();
      
    }
   
}
