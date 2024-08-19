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
        try{
            User::create($data)->assignRole('staff');
        }catch(Exception $e){
            dd($e->getMessage());
        }
       
    }
   
}
