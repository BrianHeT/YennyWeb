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
        Schema::create('books_have_genres', function (Blueprint $table) {
            $table->foreignId('book_fk')->constrained(table:'books', column:'book_id');
            $table->unsignedSmallInteger('genre_fk');
            $table->foreign('genre_fk')->references('genre_id')->on('genres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_have_genres');
    }
};
