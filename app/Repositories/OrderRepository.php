<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Repositories\interfaces\OrderRepositoryInterface;
use App\Repositories\interfaces\StaffRepositoryInterface;
use Exception;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll()
    {
        return Order::all();
    }

    public function storeOrder(array $data)
    {
        return Order::create($data);
    }
    public function storeOrderDetails(array $data)
    {
        return OrderDetail::create($data);
    }

    public function findById(string $id)
    {
        return Order::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        Order::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        Order::where('id',$id)->delete();
      
    }
   
}
