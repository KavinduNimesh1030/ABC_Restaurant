<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Models\User;
use App\Repositories\interfaces\PaymentRepositoryInterface;

use Exception;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function getAll()
    {
        return Payment::all();
    }

    public function store(array $data)
    {
        return Payment::create($data);
    }

    public function findById(string $id)
    {
        return Payment::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        Payment::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        Payment::where('id',$id)->delete();
      
    }
   
}
