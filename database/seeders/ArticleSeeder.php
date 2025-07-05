<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 5 noticias de ejemplo, una por una
        Article::create([
            'title' => 'Nueva Novela de Autora Reconocida Sorprende al Público',
            'content' => 'La reconocida autora Mariana Ruiz ha lanzado su nueva novela titulada "Ecos del Silencio". La obra explora las complejidades del duelo y la memoria, y ha sido aclamada por la crítica especializada. Los lectores ya la posicionan como una de las mejores publicaciones del año.',
            'author' => 'Redacción Literaria',
        ]);

        Article::create([
            'title' => 'Se Celebra el Día Mundial del Libro con Actividades en Todo el País',
            'content' => 'Bibliotecas, librerías y centros culturales se unieron para celebrar el Día Mundial del Libro con lecturas públicas, talleres de escritura y encuentros con autores. La jornada busca fomentar la lectura y reconocer el valor de los libros en la sociedad.',
            'author' => 'Agencia de Noticias Culturales',
        ]);

        Article::create([
            'title' => 'Crece el Interés por la Literatura Fantástica entre los Jóvenes',
            'content' => 'Un estudio reciente reveló que la literatura fantástica se posiciona como el género favorito de los jóvenes lectores. Autores emergentes están ganando popularidad gracias a plataformas digitales, y las editoriales ya planean nuevas colecciones orientadas a este público.',
            'author' => 'Observatorio Editorial',
        ]);

        Article::create([
            'title' => 'Feria Internacional del Libro Rompe Récords de Asistencia',
            'content' => 'La Feria Internacional del Libro de este año superó todas las expectativas, con más de 500 mil visitantes. Participaron editoriales de más de 20 países, y se realizaron más de 300 presentaciones de libros y actividades culturales.',
            'author' => 'Revista Lecturas',
        ]);

        Article::create([
            'title' => 'Redescubren Obra Inédita de Poeta del Siglo XIX',
            'content' => 'Investigadores literarios encontraron un manuscrito inédito del poeta romántico Julián Ledesma en una biblioteca antigua. La obra, titulada "Versos al Alba", será publicada por una editorial especializada en rescate de textos históricos.',
            'author' => 'Archivo Literario Nacional',
        ]);
    }
}
