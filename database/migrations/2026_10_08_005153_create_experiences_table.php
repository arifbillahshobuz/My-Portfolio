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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company', 50);
            $table->string('designation', 40);
            $table->string('owner', 20);
            $table->date('start_job')->nullable();
            $table->date('end_job')->nullable();
            $table->string('location', 100)->nullable();
            $table->string('image', 255)->nullable();
            $table->text('message');
            $table->timestamps();

            $table->index('designation');
            $table->index('start_job');
            $table->index('end_job');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
