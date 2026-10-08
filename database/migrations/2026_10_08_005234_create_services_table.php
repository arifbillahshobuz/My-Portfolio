<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('process')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('status', 20);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index('name');
            $table->index('status');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};