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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('description');
            $table->string('uniqid');
            $table->string('youtube_video_id')->nullable();
            $table->string('keywords')->nullable();
            $table->text('content')->nullable();
            $table->text('summary')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('addendum_video_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
