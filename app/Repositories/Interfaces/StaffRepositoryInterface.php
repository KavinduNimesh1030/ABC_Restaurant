<?php

namespace App\Repositories\interfaces;

interface StaffRepositoryInterface
{
    public function getAll();
    public function store(array $data);

}
