<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * Create a new class instance.
     */
    public function getPosts($perPage = null){
        if($perPage){
            return Post::paginate($perPage);
        }
        return Post::all();
    }
}
