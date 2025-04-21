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
        Schema::create('page_trans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('language_id')->constrained('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->json('features')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('seo_no_index')->default(false);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_trans');
    }
};
