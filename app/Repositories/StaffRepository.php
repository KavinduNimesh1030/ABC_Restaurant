<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use App\Repositories\interfaces\StaffRepositoryInterface;
use Exception;

class StaffRepository implements StaffRepositoryInterface
{
    public function getAll()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'staff');
        })->get();
    }

    public function store(array $data)
    {
        User::create($data)->assignRole('staff');
    }

    public function findById(string $id)
    {
        return User::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        User::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        try{
            User::where('id',$id)->delete();
        }catch(Exception $e){
            dd($e->getMessage());
        }
      
    }
   
}
