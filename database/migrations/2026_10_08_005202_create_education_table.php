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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution', 100);
            $table->string('degree', 100);
            $table->string('field_of_study', 100);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('location', 100)->nullable();
            $table->string('image', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('status', 20)->default('active');
            $table->timestamps();

            $table->index('institution');
            $table->index('degree');
            $table->index('image');
            $table->index('start_date');
            $table->index('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
