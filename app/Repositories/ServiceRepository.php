<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\User;
use App\Repositories\interfaces\ServiceRepositoryInterface;
use App\Repositories\interfaces\StaffRepositoryInterface;
use Exception;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAll()
    {
        return Service::all();
    }

    public function store(array $data)
    {
        return Service::create($data);
    }

    public function findById(string $id)
    {
        return Service::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        Service::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        Service::where('id',$id)->delete();
      
    }
   
}
