<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['genre_id' => 1, 'name' => 'Romance', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 2, 'name' => 'Fantasia', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 3, 'name' => 'Ciencia Ficción', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 4, 'name' => 'Paranormal', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 5, 'name' => 'Biografía', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 6, 'name' => 'Historia', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 7, 'name' => 'Misterio', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 8, 'name' => 'Thriller', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 9, 'name' => 'Terror', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 10, 'name' => 'Aventura', 'created_at' => now(), 'updated_at' => now()],
            ['genre_id' => 11, 'name' => 'Literatura Infantil', 'created_at' => now(), 'updated_at' => now()],
            
        ]);

        DB::table('books_have_genres')->insert([
        ['book_fk' => 1, 'genre_fk' => 2, ],
        ['book_fk' => 1, 'genre_fk' => 4, ],
        ['book_fk' => 2, 'genre_fk' => 5, ],
        ['book_fk' => 2, 'genre_fk' => 1, ],
        ['book_fk' => 3, 'genre_fk' => 4, ],
        ['book_fk' => 3, 'genre_fk' => 2, ],
        ['book_fk' => 4, 'genre_fk' => 7, ],
        ['book_fk' => 4, 'genre_fk' => 6, ],
        ['book_fk' => 5, 'genre_fk' => 1, ],
        ['book_fk' => 5, 'genre_fk' => 5, ],
        ['book_fk' => 6, 'genre_fk' => 1, ],
        ['book_fk' => 6, 'genre_fk' => 3, ],
    ]);
    }
}
