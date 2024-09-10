<?php

namespace App\Repositories\interfaces;

interface ReservationRepositoryInterface
{
    public function getAll();
    public function storeReservation(array $data);
    public function storeReservationDetails(array $data);
    public function findById(string $id);
    public function update(array $data, $id);
    public function delete(string $id);

}
