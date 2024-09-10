<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Service;
use App\Repositories\interfaces\PaymentRepositoryInterface;
use Exception;

class PaymentService
{
  public function __construct(private PaymentRepositoryInterface $paymentRepositoryInterface )
  {
  }

  public function getAll()
  {
    return $this->paymentRepositoryInterface->getAll();
  }



}
