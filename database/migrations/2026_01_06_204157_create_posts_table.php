<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->constrained()
                    ->cascadeOnDelete();
            $table->string('long_title');
            $table->string('short_title');
            $table->text('content');
            $table->string('author');
            $table->string('status');
            $table->dateTime('published_at')->nullable();
            $table->string('category');
            $table->string('tags')->nullable();
            $table->string('featured_image')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();   
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->dateTime('archived_at')->nullable();
            $table->string('last_edited_by')->nullable();
            $table->dateTime('last_edited_at')->nullable();
            $table->string('source')->nullable();
            $table->string('reading_time')->nullable();
            $table->string('language')->default('en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
