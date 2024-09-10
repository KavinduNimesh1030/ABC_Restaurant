<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\interfaces\ProductRepositoryInterface;
use Exception;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::all();
    }

    public function store(array $data)
    {
        return Product::create($data);
    }

    public function findById(string $id)
    {
        return Product::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        Product::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        Product::where('id',$id)->delete();
      
    }
   
}
