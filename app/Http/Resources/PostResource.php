<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'post_id' => $this->post_id,
            'long_title' => $this->long_title,
            'short_title' => $this->short_title,
            'content' => $this->content,
            'status' => $this->status,
            'published_at' => $this->published_at,
            'category' => $this->category,
            'tags' => $this->tags,
            'featured_image' => $this->featured_image,
            'views_count' => $this->views_count,
            'likes_count' => $this->likes_count,
            'comments_count' => $this->comments_count,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'is_featured' => $this->is_featured,
            'is_archived' => $this->is_archived,
            'archived_at' => $this->archived_at,
            'last_edited_by' => $this->last_edited_by,
            'last_edited_at' => $this->last_edited_at,
            'source' => $this->source,
            'reading_time' => $this->reading_time,
            'language' => $this->language,
            'author' => new UserResource(
                $this->whenLoaded('author')
            ),
        ];
    }
}
