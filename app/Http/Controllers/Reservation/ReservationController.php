<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Services\ReservationService;
use Exception;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct(private ReservationService $reservationService)
    {
    }

    public function index()
    {
        return view('account.admin.dashboard');
    }

    public function getReservation()
    {
        $reservation = $this->reservationService->getAll();
        return view('account.admin.pages.reservation.list',['reservations'=>$reservation]);
    }

    public function changeStatus(Request $request, $id)
    {
        try{
            return $this->reservationService->changeStatus($request->all(),$id);
        }catch(Exception $e){
            return redirect()->back($e->getMessage());
       }
    }
}