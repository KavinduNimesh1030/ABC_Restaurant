<?php

namespace App\Repositories\interfaces;

interface OrderRepositoryInterface
{
    public function getAll();
    public function storeOrder(array $data);
    public function storeOrderDetails(array $data);
    public function findById(string $id);
    public function update(array $data, $id);
    public function delete(string $id);

}
