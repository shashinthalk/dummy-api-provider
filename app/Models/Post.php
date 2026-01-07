<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

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

    protected $casts = [
        'published_at' => 'datetime',
        'archived_at' => 'datetime',
        'last_edited_at' => 'datetime',
        'is_featured' => 'boolean',
        'is_archived' => 'boolean',
        'tags' => 'array',
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted()
    {
        static::creating(function ($post) {
            if (empty($post->post_id)) {
                $post->post_id = Str::ulid();
            }
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->short_title);
            }
        });
    }
}
