<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\User;
use App\Services\PostService;


class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = $request->boolean('paginate', false);
        $perPage = $paginate ? $request->input('per_page', 5): null;
        $posts = $this->postService->getPosts($perPage);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $requestData = $request->validated();
        $identifyUser = User::where('user_id', $requestData['user_id'])->firstOrFail();
        $requestData['user_id'] = (int) $identifyUser->id;
        $createPost = Post::create($requestData);
        return new PostResource($createPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return PostResource::make($post->load('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return Post::destroy($post->id);
    }
} 
