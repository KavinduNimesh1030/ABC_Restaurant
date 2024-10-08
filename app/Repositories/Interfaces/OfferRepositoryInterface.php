<?php

namespace App\Repositories\interfaces;

interface OfferRepositoryInterface
{
    public function getAll();
    public function store(array $data);
    public function findById(string $id);
    public function update(array $data, $id);
    public function delete(string $id);

}
