<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,user_id',
            'long_title' => 'required|string|max:255|unique:posts,long_title',
            'short_title' => 'required|string|max:100|unique:posts,short_title',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'category' => 'required|string|max:100',
            'tags' => 'array','nullable|string|max:255',
            'featured_image' => 'nullable|url',
            'views_count' => 'nullable|integer|min:0',
            'likes_count' => 'nullable|integer|min:0',
            'comments_count' => 'nullable|integer|min:0',
            'slug' => 'required|string|max:150|unique:posts,slug',
            'excerpt' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_archived' => 'boolean',
            'archived_at' => 'nullable|date',
            'last_edited_by' => 'nullable|integer|exists:users,id',
            'last_edited_at' => 'nullable|date',
            'source' => 'nullable|string|max:255',
            'reading_time' => 'nullable|string|max:50',
            'language' => 'required|string|max:10'
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'user_id.exists' => 'The specified user does not exist.',
            'long_title.required' => 'The long title is required.',
            'long_title.string' => 'The long title must be a string.',
            'long_title.max' => 'The long title may not be greater than 255 characters.',
            'short_title.required' => 'The short title is required.',
            'short_title.string' => 'The short title must be a string.',
            'short_title.max' => 'The short title may not be greater than 100 characters.',
            'content.required' => 'The content is required.',                           
            'content.string' => 'The content must be a string.',
            'author.required' => 'The author is required.',
            'author.string' => 'The author must be a string.',
            'author.max' => 'The author may not be greater than 100 characters.',
            'status.required' => 'The status is required.',
            'status.in' => 'The status must be one of the following: draft, published, archived.',
            'published_at.date' => 'The published at must be a valid date.',
            'category.required' => 'The category is required.',
            'category.string' => 'The category must be a string.',
            'category.max' => 'The category may not be greater than 100 characters.',
            'tags.string' => 'The tags must be a string.',
            'tags.max' => 'The tags may not be greater than 255 characters.',
            'featured_image.url' => 'The featured image must be a valid URL.',
            'views_count.integer' => 'The views count must be an integer.',
            'views_count.min' => 'The views count must be at least 0.',
            'likes_count.integer' => 'The likes count must be an integer.',
            'likes_count.min' => 'The likes count must be at least 0.',
            'comments_count.integer' => 'The comments count must be an integer.',
            'comments_count.min' => 'The comments count must be at least 0.',
            'slug.required' => 'The slug is required.',
            'slug.string' => 'The slug must be a string.',
            'slug.max' => 'The slug may not be greater than 150 characters.',
            'slug.unique' => 'The slug has already been taken.',
            'excerpt.string' => 'The excerpt must be a string.',
            'excerpt.max' => 'The excerpt may not be greater than 500 characters.',
            'meta_title.string' => 'The meta title must be a string.',
            'meta_title.max' => 'The meta title may not be greater than 255 characters.',
            'meta_description.string' => 'The meta description must be a string.',
            'meta_description.max' => 'The meta description may not be greater than 500 characters.',
            'meta_keywords.string' => 'The meta keywords must be a string.',
            'meta_keywords.max' => 'The meta keywords may not be greater than 255 characters.',
            'is_featured.boolean' => 'The is featured field must be true or false.',
            'is_archived.boolean' => 'The is archived field must be true or false.',
            'archived_at.date' => 'The archived at must be a valid date.',
            'last_edited_by.integer' => 'The last edited by must be an integer.',
            'last_edited_by.exists' => 'The specified last edited by user does not exist.',
            'last_edited_at.date' => 'The last edited at must be a valid date.',
            'source.string' => 'The source must be a string.',
            'source.max' => 'The source may not be greater than 255 characters.',
            'reading_time.string' => 'The reading time must be a string.',
            'reading_time.max' => 'The reading time may not be greater than 50 characters.',
            'language.required' => 'The language is required.',
            'language.string' => 'The language must be a string.',
            'language.max' => 'The language may not be greater than 10 characters.',    
        ];
    }
}
