<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Services\OrderService;
use App\Services\ReservationService;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

  
    public function getReservation()
    {
        $orders = $this->orderService->getAll();
        return view('account.admin.pages.order.list',['orders'=>$orders]);
    }

    public function changeStatus(Request $request, $id)
    {
        try{
            return $this->orderService->changeStatus($request->all(),$id);
        }catch(Exception $e){
            return redirect()->back($e->getMessage());
       }
    }
}