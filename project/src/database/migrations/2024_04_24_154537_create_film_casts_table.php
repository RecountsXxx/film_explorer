<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('film_cast', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->nullable()->default(null);
            $table->unsignedBigInteger('cast_member_id')->nullable()->default(null);

            $table->foreign('film_id')->references('id')->onDelete('cascade')->on('films');
            $table->foreign('cast_member_id')->references('id')->onDelete('cascade')->on('cast_members');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('film_casts');
    }
};
