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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('description')->nullable();
            $table->string('live_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('iframe_url')->nullable();
            $table->integer('order')->nullable();
            $table->integer('created_year')->nullable();
            $table->boolean('is_commercial')->default(false);
            $table->boolean('is_open_source')->default(false);
            $table->boolean('is_hidden')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
