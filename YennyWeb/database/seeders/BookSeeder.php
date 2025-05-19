<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [

                'book_id' => 1,
                'title' => 'AMANECER EN LA COSECHA (JUEGOS HAMBRE 5)',
                'price' => 34999,
                'release_date' => '2025-03-01',
                'format' => 'Libros',
                'Editorial' => 'Molino',
                'Author' => 'Suzane Collins',
                'synopsis' => '¡Llega la increible quinta entrega de la saga Los Juegos del Hambre!
                
                Cuando te roban todo lo que amas, ¿queda algo por lo que luchar?
                Amanece el día de los Quincuagésimos Juegos del Hambre y el miedo atenaza a los distritos de Panem. Este año, en honor al Vasallaje de los Veinticinco, se llevarán de sus hogares al doble de tributos.
                En el Distrito 12, Haymitch Abernathy intenta no pensar demasiado en sus probabilidades. Lo único que le importa es que se acabe el día para poder estar con su chica.
                Cuando anuncian el nombre de Haymitch, todos sus sueños se rompen en pedazos. Lo separan de su familia y de su amada, y lo envían al Capitolio con los otros tres tributos del Distrito 12: una amiga que es casi como una hermana pequeña para él, un chico obsesionado con analizar apuestas y la chica más estirada de la ciudad. Cuando empiezan los Juegos, Haymitch comprende que en el Capitolio quieren que fracase. Sin embargo, algo dentro de él desea luchar… y que el eco de esa lucha llegue mucho más allá de la mortífera arena.',
                'created_at' => now(),
                'updated_at' => now()
            
            ],
        [
            'book_id' => 2,
            'title' => 'ESTE DOLOR NO ES MIO',
            'price' => 32900,
            'release_date' => '2018-02-01',
            'format' => 'Libros',
            'Editorial' => 'Grupal/gaia',
            'Author' => 'Mark Wolynn',
            'synopsis' => 'DEPRESIÓN. ANSIEDA
            D. DOLORES CRÓNICOS. FOBIAS. PENSAMIENTOS OBSESIVOS. La evidencia científca muestra que los traumas pueden ser heredados. Existen pruebas fiables de que muchos problemas crónicos o de largo plazo pueden no tener su origen en nuestras vivencias inmediatas o en desequilibrios químicos de nuestro cerebro, sino en las vidas de nuestros padres, abuelos o bisabuelos. Mark Wolynn, fundador y director del Instituto de Constelaciones Familiares (FCI) y pionero en el estudio de los traumas familiares heredados, presenta en "Este dolor no es mío" un enfoque transformador que permite resolverproblemas crónicos que no han podido ser aliviados mediante la terapia tradicional, los medicamentos u otras medidas.',
            'created_at' => now(),
                'updated_at' => now()
        ],
        [
            'book_id' => 3,
            'title' => 'LA VEGETARIANA',
            'price' => 23900,
            'release_date' => '2024-10-01',
            'format' => 'Libros',
            'Editorial' => 'Random House',
            'Author' => 'Han Kang',
            'synopsis' => 'Hasta ahora, Yeonghye ha sido la esposa diligente y discreta que su marido siempre ha deseado. Sin ningún atractivo especial ni ningún defecto en particular, cumple los requisitos necesarios para que su matrimonio funcione sin sobresaltos. Todo cambia cuando unas pesadillas brutales y sanguinarias empiezan a despertarla por las noches, y siente la imperiosa necesidad de deshacerse de toda la carne del frigorífico. A partir de ese momento, Yeonghye impondrá en casa una dieta exclusivamente vegetariana que su marido aceptará entre atónito y molesto. Este será un primer acto subversivo seguido de muchos otros que la llevarán a la búsqueda de una existencia más pura y despojada, más cercana a la vida vegetal, un lugar donde el poder erótico y floral de su cuerpo romperá las estrictas costumbres de una sociedad patriarcal y ultracapitalista. Situada en Corea del Sur, La vegetariana es la historia de una metamorfosis radical y un acto de resistencia contra la violencia y la intolerancia humanas. Galardonada con el Premio Booker Internacional, esta bella y perturbadora novela catapultó internacionalmente a la que es una de las voces más interesantes y provocadoras de la literatura asiática contemporánea. La crítica ha dicho: «Han Kang transforma la desgastada idea de la desconexión entre cuerpo y mente en algo fresco y sustancial». Michele Filgate, Los Angeles Times Sobre La vegetariana: «Lo mejor de Han es cuando se centra en la parte física del lenguaje, los lectores de sus obras anteriores, sobre todo de La vegetariana, reconocerán su estilo para describir un tipo de repugnancia voluptuosa». Hannah Gold, The Washington Post «El glorioso tratamiento de Han sobre la acción, elección personal, la sumisión y la subversión hallan su forma en la parábola. Hay algo especial en las formas literarias cortas [...] en las que lo alegórico y la violencia gana potencia en recipientes pequeños. La vegetariana es afín a obras breves tan diversos como la novela Lazos de sangre de Ceri',
            'created_at' => now(),
                'updated_at' => now()
        
            ],
        [
            'book_id' => 4,
            'title' => 'EL BUEN MAL',
            'price' => 24999,
            'release_date' => '2018-02-01',
            'format' => 'Libros',
            'Editorial' => 'Random House',
            'Author' => 'Samanta SCHWEBLIN',
            'synopsis' => 'Samanta Schweblin, la maestra del cuento contemporáneo latinoamericano, regresa con un libro destinado a convertirse en un clásico global. Magnéticos e irresistibles. En cada uno de los cuentos de «El buen mal», Samanta Schweblin nos abduce a otra dimensión donde quedamos en contacto íntimo con sus personajes. Encandilados por el fulgor de la inminente tragedia, vulnerables y profundamente humanos, advierten cuanto podría transformarlos la irrupción de lo inesperado. A algunos los dejará de pie frente al dolor, a otros dialogando con la culpa y a todos atravesados por la incertidumbre. ¿Importa saber qué es verdad? Se trata, de principio a fin, de ser partícipes de un fenomenal artificio literario. Con inédita perspicacia, Schweblin intuye el punto de quiebre de una voluntad, la intensidad premonitoria de un temblor y la lejanía que impone la ternura. Conoce la mejor de las infinitas posibilidades de una historia y el modo de encajar las piezas de una trama para dar con un gran relato que se hunda y proyecte, oscurezca e ilumine el día a día de la época y el alma de quienes la habitan. En su literatura, premiada internacionalmente, los filos entre realidad y ensueño deslumbran como los de un cuchillo.',
            'created_at' => now(),
                'updated_at' => now()
        ],
        [
            'book_id' => 5,
            'title' => 'MI NOMBRE ES EMILIA DEL VALLE',
            'price' => 34499,
            'release_date' => '2025-04-01',
            'format' => 'Libros',
            'Editorial' => 'Sudamericana',
            'Author' => 'Isabel Allende',
            'synopsis' => 'Una inolvidable historia de amor y de guerra protagonizada por una mujer que, enfrentada a los mayores desafíos, sobrevive y se reinventa.

San Francisco, 1866: una monja irlandesa, embarazada y abandonada por un aristócrata chileno tras una apasionada relación, da a luz a una niña a la que llama Emilia del Valle. Criada por su cariñoso padrastro, Emilia se convertirá en una joven brillante de gran personalidad, autónoma e independiente, que desafiará las normas sociales de su tiempo para profesar su verdadera pasión y vocación: la escritura.
Con tan solo diecisiete años, publicará novelas de aventuras bajo un pseudónimo masculino. Pero, enseguida, su mundo ficticio se le quedará pequeño y decidirá optar al puesto de periodista que se le ofrece en el periódico local para vivir de cerca la realidad.
Tiempo después, se le presentará la oportunidad de viajar como corresponsal a la ferviente guerra civil en Chile y no dudará en tomarla. Junto al avezado periodista Eric Whelan, Emilia se encontrará una nación en quiebra, al borde del abismo. Mientras cubre el conflicto bélico entre el presidente Balmaceda y el congreso rebelde, aprovechará la estancia en el país para explorar sus vínculos con la familia Del Valle y poder, al fin, conocer a su padre.
Sus reportajes la situarán en el centro de la guerra, soportando situaciones de terrible violencia en el campo de batalla, en el hospital de sangre y en la cárcel, donde varias veces se debatirá entre la vida y la muerte. Al tiempo, vivirá -y sufrirá- el amor y conocerá también, entre bosques, lagos y volcanes, una tierra donde no llega el horror de la guerra y donde, tal vez, acabe descubriendo no solo su destino sino su propia identidad.
Una cautivadora e inolvidable historia de amor y de guerra, de descubrimiento y redención, protagonizada por una mujer que, enfrentada a los mayores desafíos, sobrevive y se reinventa. Emilia del Valle es desde ya un personaje inolvidable del universo más fértil de Isabel Allende, la saga Del Valle, que empezó con su obra maestra La casa de los espíritus y continuó con Hija de la fortuna y Retrato en sepia.',
                'created_at' => now(),
                'updated_at' => now()
        ],
        [
            'book_id' => 6,
            'title' => 'LA CASA NEVILLE 3. YO SOY EL VIENTO',
            'price' => 32900,
            'release_date' => '2024-11-01',
            'format' => 'Libros',
            'Editorial' => 'Planeta',
            'Author' => 'Florencia Bonelli',
            'synopsis' => 'Manon Neville ha caído en la trampa hábilmente urdida por su pérfido cuñado Julian Porter-White. Con su amado Alexander Blackraven a miles de millas de Londres, se enfrenta a un peligro inminente, quizás a la muerte. Solo con la ayuda de sus fieles amigos logrará superar esta nueva y dura prueba que el destino le ha tendido. Aunque no será la última. Otros desafíos la aguardan en una lucha que parece no tener fin.En especial uno de ellos, recuperar al pequeño hijo de Alexander, que su antigua amante Alexandrina Trewartha abandonó en un convento de Dublín, se presenta como el más importante para Manon. Nada la detendrá en su carrera por encontrarlo, incluso viajará hasta las lejanas tierras del Río de la Plata, donde se convertirá en el blanco de una intriga por el control de la explotación del cerro Famatina.La Casa Neville. Yo soy el viento es un cierre a toda orquesta para esta inigualable trilogía que tiene por protagonista a la formidable Manon Neville. Con un ritmo trepidante, Florencia Bonelli conduce al lector por un laberinto de traiciones, conspiraciones y peligros, del que Manon logrará salir recurriendo al insuperable poder del amor.',
            'created_at' => now(),
                'updated_at' => now()
        ],
    ]);
    }
}
