<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('film_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('film_id');
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('film_images');
    }
};
