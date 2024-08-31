<?php

namespace App\Repositories;

use App\Models\Restaurant;
use App\Models\RestaurantService;
use App\Repositories\interfaces\RestaurantRepositoryInterface;

;

class RestaurantRepository implements RestaurantRepositoryInterface
{
    public function getAll()
    {
        return Restaurant::all();
    }

    public function store(array $data)
    {
        return Restaurant::create($data);
    }

    public function findById(string $id)
    {
        return Restaurant::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        Restaurant::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        RestaurantService::where('restaurant_id',$id)->delete();
        Restaurant::where('id',$id)->delete();
    }

    public function storeRestaurantServices(array $data)
    {
        RestaurantService::create($data);
    }
   
}
