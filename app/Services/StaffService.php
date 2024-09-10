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

  public function findById(string $id)
  {
    return $this->staffRepositoryInterface->findById($id);
  }

  public function update(array $data, $id)
  {
    return $this->staffRepositoryInterface->update($data,$id);
  }

  public function delete(string $id)
  {
    $this->staffRepositoryInterface->delete($id);
  }

}
