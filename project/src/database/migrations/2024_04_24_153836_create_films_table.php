<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Show', 'Hide'])->default('Show');
            $table->string('title_uk');
            $table->string('title_en');
            $table->text('description_uk');
            $table->text('description_en');
            $table->string('poster')->nullable();
            $table->string('youtube_trailer_id')->nullable();
            $table->year('release_year');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
