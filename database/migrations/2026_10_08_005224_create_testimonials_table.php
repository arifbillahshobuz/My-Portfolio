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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('designation', 50)->nullable();
            $table->string('image')->nullable();
            $table->longText('message')->nullable();
            $table->unsignedTinyInteger('rating')->nullable();
            $table->string('status', 20)->default('active');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->index('name');
            $table->index('client_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
