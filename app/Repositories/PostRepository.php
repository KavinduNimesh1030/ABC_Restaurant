<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getAll()
    {
        return Post::all();
    }
   
}
