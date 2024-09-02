<?php

namespace App\Services;

use App\Repositories\interfaces\ReservationRepositoryInterface;
use App\Repositories\interfaces\PaymentRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;


class ReservationService
{
  public function __construct(private ReservationRepositoryInterface $reservationRepositoryInterface, private PaymentRepositoryInterface $paymentRepositoryInterface)
  {
  }

  public function getAll()
  {
    return $this->reservationRepositoryInterface->getAll();
  }

  public function store(array $data)
  {
     try{
      $userId = Auth::user() != null ? Auth::user()->id:null;
      $reservation = $this->reservationRepositoryInterface->storeReservation(['restaurant_id'=>null,'user_id'=>$userId,'status'=>'Pending','reservation_date'=>$data['date']]);
      $data['reservation_id']= $reservation->id;
      $this->reservationRepositoryInterface->storeReservationDetails($data);
     }catch(Exception $e){
      dd($e->getMessage());
     }
  }


 

}
