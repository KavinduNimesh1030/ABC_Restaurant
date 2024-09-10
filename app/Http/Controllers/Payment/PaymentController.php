<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;


class PaymentController extends Controller
{
    public function __construct(private PaymentService $paymentService)
    {
    }

    public function getAll()
    {
        $payment = $this->paymentService->getAll();
        return view('account.admin.pages.payment.list',['payments'=>$payment]);
    }


    
}