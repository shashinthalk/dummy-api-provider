<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'long_title',
        'short_title',
        'content',
        'author',
        'status',
        'published_at',
        'category',
        'tags',
        'featured_image',
        'views_count',
        'likes_count',
        'comments_count',
        'slug',
        'excerpt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_featured',
        'is_archived',
        'archived_at',
        'last_edited_by',
        'last_edited_at',
        'source',
        'reading_time',
        'language'
    ];
}
