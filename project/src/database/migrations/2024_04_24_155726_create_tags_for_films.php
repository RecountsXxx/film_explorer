<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags_for_films', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name_uk');
            $table->string('tag_name_en');
            $table->string('slug_uk');
            $table->string('slug_en');
            $table->unsignedBigInteger('film_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags_for_films');
    }
};
