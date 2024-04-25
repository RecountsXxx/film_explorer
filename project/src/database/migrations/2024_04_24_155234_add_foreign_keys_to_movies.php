<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('films', function (Blueprint $table) {
            $table->unsignedBigInteger('film_id')->nullable()->default(null);
            $table->unsignedBigInteger('cast_id')->nullable()->default(null);

            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('cast_id')->references('id')->on('cast_members');
        });
    }

    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign('film_id');
            $table->dropForeign('cast_id');
        });
    }
};
