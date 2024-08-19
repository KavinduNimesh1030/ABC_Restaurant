<?php

namespace App\Services;

use App\Repositories\interfaces\StaffRepositoryInterface;

class StaffService
{
  public function __construct(private StaffRepositoryInterface $staffRepositoryInterface)
  {
  }

  public function getAll()
  {
    return $this->staffRepositoryInterface->getAll();
  }

  public function store(array $data)
  {
    return $this->staffRepositoryInterface->store($data);
  }

}
