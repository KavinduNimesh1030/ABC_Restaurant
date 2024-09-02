<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Service;
use App\Repositories\interfaces\OrderRepositoryInterface;
use App\Repositories\interfaces\PaymentRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class OrderService
{
  public function __construct(private OrderRepositoryInterface $orderRepositoryInterface, private PaymentRepositoryInterface $paymentRepositoryInterface)
  {
  }

  public function getAll()
  {
    return $this->orderRepositoryInterface->getAll();
  }

  public function store(array $data)
  {
     try{
      $paymentType =  $data['payment_type'];
      unset($data['payment_type']);
      $order = $this->orderRepositoryInterface->storeOrder(['user_id'=>Auth::user()->id,'status'=>'Pending']);
      $data['order_id']= $order->id;
      $this->orderRepositoryInterface->storeOrderDetails($data);
      $amount = $this->calculateCartTotal();
      $this->paymentRepositoryInterface->store(['resourceble_id'=>$order->id,'resourceble_type'=>Order::class,'user_id'=>Auth::user()->id,'amount'=>$amount,'payment_date'=>Date::now(),'payment_method'=>$paymentType]);
     }catch(Exception $e){
      dd($e->getMessage());
     }
  }

  private function calculateCartTotal()
  {
    $cart = session()->get('cart', []);
    $total = 0.0;
    foreach ($cart as $item) {
        $productPrice = (float) $item['product']['price'];
        $quantity = (int) $item['quantity'];
        $total += $productPrice * $quantity;
    }
    return $total;
  }

  // public function findById(string $id)
  // {
  //   return $this->orderRepositoryInterface->findById($id);
  // }

  // public function update(array $data, $id)
  // {
  //     $media = $this->mediaService->storeImages($data['image']);
  //     unset($data['image']);
  //     $this->imageableService->store($media['id'], $id, Service::class, 'Feature');
  //     return $this->orderRepositoryInterface->update($data,$id);
  // }

  // public function delete(string $id)
  // {
  //   $this->orderRepositoryInterface->delete($id);
  // }

}
