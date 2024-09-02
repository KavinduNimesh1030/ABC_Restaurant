<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Repositories\interfaces\ReservationRepositoryInterface;
use Exception;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function getAll()
    {
        return Reservation::all();
    }

    public function storeReservation(array $data)
    {
        return Reservation::create($data);
    }
    public function storeReservationDetails(array $data)
    {
        return ReservationDetail::create($data);
    }

    public function findById(string $id)
    {
        return Reservation::where('id',$id)->first();
    }

    public function update(array $data, $id)
    {
        Reservation::where('id',$id)->update($data);
    }

    public function delete(string $id)
    {
        Reservation::where('id',$id)->delete();
      
    }
   
}
