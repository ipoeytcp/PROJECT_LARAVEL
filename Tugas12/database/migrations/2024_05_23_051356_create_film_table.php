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
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('ringkasan')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('poster');
            $table->unsignedBigInteger('genre_id');

            $table->foreign('genre_id')->references('id')->on('genre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
