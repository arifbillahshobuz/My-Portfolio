<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);
            $table->string('designation', 100)->nullable();
            $table->string('image', 255)->nullable();

            $table->longText('message')->nullable();

            $table->unsignedTinyInteger('rating')->nullable();

            $table->string('status', 20)->default('active');

            $table->foreignId('client_id')
                ->constrained('clients')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->index('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};