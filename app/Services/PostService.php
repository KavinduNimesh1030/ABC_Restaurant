<?php

namespace App\Services;

use App\Repositories\interfaces\PostRepositoryInterface;

class PostService
{
  public function __construct(private PostRepositoryInterface $postRepositoryInterface)
  {
  }

  public function getAll()
  {
    return $this->postRepositoryInterface->getAll();
  }

}
