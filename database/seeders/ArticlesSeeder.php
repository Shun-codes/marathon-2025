<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('fr_FR');

        $laurine = User::where('email', 'laurine@gmail.com')->first();

        $titre1 = "Au clair de la lune";
        $texte1 = "Ah, Au clair de la lune, cette ballade intemporelle où l’on découvre que la première urgence, au XVIIIᵉ siècle, n’était ni la faim, ni la guerre, ni même la météo… mais un manque de bougie. Le héros, manifestement équipé d’une mémoire de poisson rouge, se retrouve plongé dans l’obscurité totale et décide d’aller sonner chez son voisin Pierrot, spécialiste incontesté de la gestion d’inventaire… enfin, c’est ce qu’il espère. Pierrot, bien sûr, dort. Car personne ne dort jamais dans une chanson, sauf quand on a besoin d’une bougie.<br />

Après quoi, la quête du luminaire devient soudain une tragicomédie du quotidien : on gratte, on cherche, on soupire… et on réalise que toute l'intrigue repose sur un objet disparu qui aurait pu être remplacé par absolument n’importe quoi. Une torche ? Une lanterne ? Une luciole motivée ? Non. Il faut une bougie. Et tant pis si l’on réveille tout le voisinage au passage.<br />

Cette chanson, finalement, est une sorte de tutoriel poétique sur le thème : “Comment créer du drame avec un accessoire à deux sous.” Et ça fonctionne encore aujourd’hui, car rien n’est plus universel que de chercher quelque chose dans le noir, de ne pas le trouver, et d’accuser un ami innocent au passage.<br />

Bref : une aventure nocturne minimaliste, un suspense à hauteur d’enfant, et une morale simple — mieux vaut vérifier sa réserve de bougies avant l’heure du coucher.<br />";


        $resume1 = "Un homme cherche désespérément une bougie...";

        Article::create([
            'titre' => $titre1,
            'resume' => $resume1,
            'texte' => $texte1,
            'image' => 'images/au-clair-de-la-lune.jpg',
            'media' => 'https://comptines.tv/musiques/au_clair_de_la_lune.mp3',
            "en_ligne" => 1,
            "nb_vues" => 50,
            "user_id" => 1,
            "rythme_id" => 1,
            "accessibilite_id" => 3,
            "conclusion_id" => 1,
        ]);

        // --- Génération des 50 articles Faker ---
        for ($i = 1; $i <= 50; $i++) {
            Article::create([
                'titre' => $faker->text(20),
                'resume' => $faker->realTextBetween(30, 100, 2),
                'texte' => $faker->realTextBetween(160, 500, 2),
                'image' => "images/article$i.jpg",
                'media' => 'https://comptines.tv/musiques/au_clair_de_la_lune.mp3',
                "user_id" => $faker->numberBetween(1, 50),
                "rythme_id" => $faker->numberBetween(1, 5),
                "accessibilite_id" => $faker->numberBetween(1, 5),
                "conclusion_id" => $faker->numberBetween(1, 5),
                "en_ligne" => $faker->numberBetween(0, 1),
                "nb_vues" => $faker->numberBetween(0, 20),
            ]);
        }

        $titre2 = "La Bossa Nova comme art de la douceur.";
        $texte2 = "Il y a des chansons qui n’élèvent pas la voix, mais qui élèvent l’âme. A Felicidade, composée par Antonio Carlos Jobim, en fait partie. Dès les premières mesures, la bossa nova déploie son art subtil : une musique qui ne cherche jamais à impressionner, mais qui ensorcelle par sa retenue, sa douceur, son élégance naturelle. Ici, tout est murmure, balancement, caresse sonore.<br />
Jobim signe une œuvre d’une beauté indescriptible. La mélodie avance comme une vague tiède sur le sable, portée par des harmonies riches mais jamais lourdes. Chaque accord semble respirer, chaque silence a un sens. La bossa nova, dans A Felicidade, devient un art de vivre : elle invite à ralentir, à écouter le monde autrement, à accepter la fragilité de l’instant présent. Car la chanson parle du bonheur ( éphémère, fugace ) mais sans mélancolie pesante. Au contraire, elle célèbre cette impermanence avec une grâce lumineuse. <br />
La voix, souvent douce, ne domine jamais la musique : elle s’y fond. Elle raconte plus qu’elle ne proclame, suggère plus qu’elle n’affirme. C’est là toute la force de la bossa nova : une révolution en sourdine, une modernité qui ne crie pas, mais qui transforme durablement notre manière d’écouter. Avec A Felicidade, Jobim prouve que l’émotion n’a pas besoin d’excès pour être profonde. Elle a juste besoin de toucher en plein cœur l’auditeur pour permettre une symbiose plus profonde et plus intense au niveau émotionnel.<br />
Avec cette œuvre de Jobim, la Bossa Nova est désormais bien définie dans ce passage. Les Écouter cette chanson, c’est entrer dans un univers où le bonheur n’est pas une promesse, mais un instant fragile qu’il faut savoir reconnaître. Une musique qui ne s’impose pas, mais qui reste. Longtemps.<br />
";
        $resume2 = "La révolution en sourdine : quand la bossa nova murmure plus qu’elle ne crie.";

        Article::create([
            'titre' => $titre2,
            'resume' => $resume2,
            'texte' => $texte2,
            'image' => 'images/a-felicidate.jpg',
            'media' => 'https://soundcloud.com/hiraethdnb/sergio-mendes-brasil-66-mas-que-nada-hiraeth-bootleg-free-download?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing',
            "en_ligne" => 1,
            "nb_vues" => 50,
            "user_id" => $laurine->id,
            "rythme_id" => 1,
            "accessibilite_id" => 3,
            "conclusion_id" => 1,
        ]);

        $titre3 = "Intime vs populaire";
        $texte3 = "La bossa nova est dans la plupart du temps célébrée pour sa douceur et son raffinement.  Mais cette retenue, célébrée comme une qualité essentielle, peut tout autant se transformer en faiblesse. À force de murmurer, le genre risque parfois de s’effacer, laissant l’auditeur sur une impression de neutralité polie plutôt que de véritable engagement émotionnel.<br />
	Son esthétique repose sur un équilibre fragile : subtilité rythmique, harmonies évoluées, interprétation contenue. Or, cet équilibre peut vite devenir redondant. Le balancement caractéristique, la guitare un peu trop présente, la voix douce et presque détachée forment un langage immédiatement reconnaissable au point de frôler le cliché. Pour un auditeur qui n’est pas connaisseur, beaucoup de morceaux semblent se ressembler, prisonniers d’un tempo médian et d’une atmosphère figée.<br />
	Comparée aux musiques dites « de l’excès », la bossa nova fait le choix du retrait. Mais ce retrait peut être perçu comme une absence de prise de risque. Alors que  d’autres styles explorent la tension ou la rupture, elle reste dans une zone de confort sonore. Peu de crescendos, peu de conflits rythmiques, peu de moments de véritable surprise. L’émotion est suggérée, certes, mais parfois au prix d’une certaine fadeur.<br />
	Sur le plan culturel, sa réception internationale a aussi contribué à son lissage. Exportée comme musique d’ambiance chic, elle a souvent été réduite à un fond sonore élégant, déconnecté de ses racines sociales et de sa complexité originelle. Cette transformation en « musique agréable » renforce l’idée d’un genre plus décoratif que percutant, sans effet réel.<br />
	La bossa nova n’est pas sans qualités, loin de là. Mais son culte de la discrétion peut agacer, surtout face à des musiques qui assument pleinement l’excès comme moteur d’énergie et de renouvellement. À trop vouloir caresser l’oreille, elle oublie parfois de la provoquer.<br />";
        $resume3 = "Trop discrète pour marquer ? La bossa nova face aux musiques de l’excès.";

        Article::create([
            'titre' => $titre3,
            'resume' => $resume3,
            'texte' => $texte3,
            'image' => 'images/intime-vs-populaire.jpg',
            'media' => 'https://music.apple.com/za/song/mas-que-nada/201857445',
            "en_ligne" => 1,
            "nb_vues" => 50,
            "user_id" => $laurine->id,
            "rythme_id" => 1,
            "accessibilite_id" => 3,
            "conclusion_id" => 1,
        ]);
    }
}
