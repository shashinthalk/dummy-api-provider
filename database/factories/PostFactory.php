<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Str::ulid(),
            'long_title' => $this->faker->sentence(),
            'short_title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraphs(5, true),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'published_at' => $this->faker->optional()->dateTime(),
            'category' => $this->faker->word(),
            'tags' => implode(',', $this->faker->words(3)),
            'featured_image' => $this->faker->optional()->imageUrl(),
            'views_count' => $this->faker->numberBetween(0, 1000),
            'likes_count' => $this->faker->numberBetween(0, 500),
            'comments_count' => $this->faker->numberBetween(0, 200),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->optional()->sentence(),
            'meta_title' => $this->faker->optional()->sentence(),
            'meta_description' => $this->faker->optional()->paragraph(),
            'meta_keywords' => implode(',', $this->faker->words(5)),
            'is_featured' => $this->faker->boolean(20),
            'is_archived' => $this->faker->boolean(10),
            'archived_at' => $this->faker->optional()->dateTime(),
            'last_edited_by' => $this->faker->optional()->name(),
            'last_edited_at' => $this->faker->optional()->dateTime(),
            'source' => $this->faker->optional()->url(),
            'reading_time' => $this->faker->numberBetween(1, 15) . ' min',
            'language' => $this->faker->randomElement(['en', 'es', 'fr', 'de', 'it']),
        ];
    }
}