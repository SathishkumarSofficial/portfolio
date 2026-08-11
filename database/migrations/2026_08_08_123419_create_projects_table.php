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
            $table->text('description');
            $table->string('image')->default('PROJECT_IMAGE');
            $table->text('technologies'); // Stored as JSON or CSV
            $table->string('live_link')->default('PROJECT_LIVE_LINK');
            $table->string('github_link')->default('PROJECT_GITHUB_LINK');
            $table->text('features')->nullable(); // Stored as JSON
            $table->integer('sort_order')->default(0);
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
