<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cast_members', function (Blueprint $table) {
            $table->id();
            $table->string('name_uk');
            $table->string('name_en');
            $table->string('photo')->nullable();
            $table->enum('type', ['Director', 'Writer', 'Actor', 'Composer']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cast_members');
    }
};
