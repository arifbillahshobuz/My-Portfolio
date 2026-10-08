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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->json('images')->nullable();
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('live_link')->nullable();
            $table->foreignId('project_id')->unique()->constrained('projects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->index('project_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
