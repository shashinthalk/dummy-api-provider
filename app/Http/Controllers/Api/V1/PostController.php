<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => 1,
            'long_title' => 'Sample Post Long Title',
            'short_title' => 'Sample Post Short Title',
            'content' => 'This is a sample post content.',
            'author' => 'John Doe',
            'status' => 'draft',
            'published_at' => null,
            'category' => 'General',
            'tags' => 'sample,post,blog',
            'featured_image' => null,
            'views_count' => 0,
            'likes_count' => 0,
            'comments_count' => 0,
            'slug' => 'sample-post-title',
            'excerpt' => 'This is a sample excerpt of the post.',
            'meta_title' => 'Sample Post Meta Title',
            'meta_description' => 'This is a sample meta description for the post.',
            'meta_keywords' => 'sample,post,meta',
            'is_featured' => false,
            'is_archived' => false,
            'archived_at' => null,
            'last_edited_by' => null,
            'last_edited_at' => null,
            'source' => null,
            'reading_time' => '5 min',
            'language' => 'en'
        ];
        return Post::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
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
