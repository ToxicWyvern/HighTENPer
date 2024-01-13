<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create(); //kan 10 fake users maken, maar aan 1 hebben we ook genoeg

        //zorgt dat er altijd een account is voor Thijs, Ebram, Pedro, Nilo en een testuser

         \App\Models\User::factory()->create([
             'name' => 'Thijs',
             'email' => 'thijs@example.com',
             'password'=> 'leaderboardboard',
             'profileImage' => 'profileImages/default.jpg',
             'admin' => 1,
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Ebram',
            'email' => 'ebram@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Nilo',
            'email' => 'nilo@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'testuser',
            'email' => 'testuser@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 0,
        ]);


        //maakt alle tracks aan die er op dit moment zijn in de game

        \App\Models\Race::factory()->create([
            'name' => 'Bahrain',
            'date'=>'24-02-29'
            ]);

        \App\Models\Race::factory()->create([
            'name' => 'Saudi Arabia',
            'date'=>'24-03-07'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Australia',
            'date'=>'24-03-22'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Japan',
            'date'=>'24-04-05'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'China',
            'date'=>'24-04-19'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Miami (USA)',
            'date'=>'24-05-03'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Emilia Romagna',
            'date'=>'24-05-17'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Monaco',
            'date'=>'24-05-24'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Canada',
            'date'=>'24-06-07'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Spain',
            'date'=>'24-06-21'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Austria',
            'date'=>'24-06-28'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'United Kingdom',
            'date'=>'24-07-05'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Hungary',
            'date'=>'24-07-19'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Belgium',
            'date'=>'24-07-26'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Netherlands',
            'date'=>'24-08-23'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Italy',
            'date'=>'24-08-30'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Azerbaijan',
            'date'=>'24-09-13'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Singapore',
            'date'=>'24-09-20'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Austin (USA)',
            'date'=>'24-10-18'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Mexico',
            'date'=>'24-10-25'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Brazil',
            'date'=>'24-11-01'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Las Vegas (USA)',
            'date'=>'24-11-21'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Qatar',
            'date'=>'24-11-29'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Abu Dhabi',
            'date'=>'24-12-06'
        ]);

        // Add more tracks here

        //maakt alle teams aan die er op dit moment zijn in de game

        \App\Models\team::factory()->create([
            'team' => 'Red Bull Racing'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Mercedes'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'McLaren'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Ferrari'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Aston Martin'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Alpine'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Williams'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'AlphaTauri'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Kick Sauber'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Haas F1 Team'
        ]);


        //maakt alle tires aan

        \App\Models\tire::factory()->create([
            'tire' => 'Soft'
        ]);

        \App\Models\tire::factory()->create([
            'tire' => 'Medium'
        ]);

        \App\Models\tire::factory()->create([
            'tire' => 'Hard'
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Max Verstappen',
            'photo' => 'images/Max.jpg',
            'bio' => 'De Nederlandse F1-coureur Max Verstappen staat bekend om zijn agressieve rijstijl en indrukwekkende snelheid. Als een van de jongste coureurs in de geschiedenis van de sport heeft hij al meerdere overwinningen behaald en wordt gezien als een potentiële wereldkampioen. Zijn vastberadenheid en vastberadenheid op het circuit hebben hem tot een publiekslieveling gemaakt.',
            'team_id' => 1,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Perez',
            'photo' => 'images/Perez.jpg',
            'bio' => 'Sergio Perez, de ervaren Mexicaanse coureur, staat bekend om zijn vermogen om onder druk te presteren en podiumplaatsen te behalen. Als waardevolle toevoeging aan Red Bull Racing heeft Perez zijn talent bewezen met consistente prestaties en strategisch rijden.',
            'team_id' => 1,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Russel',
            'photo' => 'images/Russel.jpg',
            'bio' => 'George Russel, een opkomend Brits racetalent, heeft indruk gemaakt met zijn prestaties bij Williams. Zijn snelheid en focus op het circuit maken hem een veelbelovende coureur voor de toekomst van de Formule 1.',
            'team_id' => 2,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Hamilton',
            'photo' => 'images/Hamilton.jpg',
            'bio' => 'Lewis Hamilton, de Britse F1-legende, heeft meerdere wereldtitels op zijn naam staan en wordt beschouwd als een van de grootste coureurs aller tijden. Naast zijn succes op het circuit is Hamilton ook een activist, die zich inzet voor sociale rechtvaardigheid en gelijkheid.',
            'team_id' => 2,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Leclerc',
            'photo' => 'images/Leclerc.jpg',
            'bio' => 'Charles Leclerc, de getalenteerde coureur uit Monaco, is een opvallende verschijning bij het Ferrari-team. Met zijn jeugdige energie en indrukwekkende rijstijl heeft Leclerc zich gevestigd als een veelbelovende kracht in de Formule 1.',
            'team_id' => 4,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Sainz',
            'photo' => 'images/Sainz.jpg',
            'bio' => 'Carlos Sainz, de Spaanse coureur, heeft zijn stempel gedrukt als een betrouwbare en consistente rijder. Als lid van het Ferrari-team heeft Sainz laten zien dat hij in staat is om competitieve prestaties te leveren in de hoogste klasse van de autosport.',
            'team_id' => 4,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Piastri',
            'photo' => 'images/Piastri.jpg',
            'bio' => 'Oscar Piastri, het Australische racetalent, heeft indruk gemaakt door de F2-titel te veroveren. Zijn opkomst en succes in de juniorklassen voorspellen een veelbelovende toekomst in de Formule 1.',
            'team_id' => 3,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Norris',
            'photo' => 'images/Norris.jpg',
            'bio' => 'Lando Norris, de jonge Britse coureur bij McLaren, is niet alleen bekend om zijn indrukwekkende prestaties op het circuit, maar ook om zijn levendige persoonlijkheid. Met zijn talent en humor heeft Norris zich tot een populaire figuur gemaakt binnen de F1-gemeenschap.',
            'team_id' => 3,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Stroll',
            'photo' => 'images/Stroll.jpg',
            'bio' => 'Lance Stroll, de Canadese coureur bij het door zijn vader eigendom Racing Point-team, heeft zich gevestigd als een consistente rijder met potentieel. Zijn betrokkenheid in het familieteam draagt bij aan zijn unieke positie in de sport.',
            'team_id' => 5,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Alonso',
            'photo' => 'images/Alonso.jpg',
            'bio' => 'Fernando Alonso, de ervaren Spaanse coureur, maakte een opmerkelijke terugkeer naar de Formule 1. Met een indrukwekkende carrière achter de rug, blijft Alonso een geduchte concurrent met zijn vastberadenheid en ervaring.',
            'team_id' => 5,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Ocon',
            'photo' => 'images/Ocon.jpg',
            'bio' => 'Esteban Ocon, de Franse coureur bij Alpine, heeft bewezen een snelle en consistente rijder te zijn. Zijn focus en vastberadenheid hebben hem geholpen om zijn plaats te vestigen in de wereld van de Formule 1.',
            'team_id' => 6,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Gasly',
            'photo' => 'images/Gasly.jpg',
            'bio' => 'Pierre Gasly, de Franse coureur, heeft zijn talent bewezen met verrassende overwinningen en podiumplaatsen. Zijn vastberadenheid en toewijding hebben Gasly tot een opvallende rijder gemaakt in het competitieve veld van de Formule 1.',
            'team_id' => 6,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Albon',
            'photo' => 'images/Albon.jpg',
            'bio' => 'Alexander Albon, de Thaise coureur, strijdt voor een herkansing na zijn tijd bij Red Bull Racing. Zijn vastberadenheid en streven naar verbetering maken Albon een coureur om in de gaten te houden.',
            'team_id' => 7,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Sargeant',
            'photo' => 'images/Sargeant.jpg',
            'bio' => 'Logan Sargeant, het Amerikaanse racetalent in de F2, heeft indruk gemaakt met zijn prestaties op het circuit. Zijn vastberadenheid om door te breken in de Formule 1 maakt Sargeant een interessante opkomende coureur.',
            'team_id' => 7,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Ricciardo',
            'photo' => 'images/Ricciardo.jpg',
            'bio' => 'Daniel Ricciardo, de Australische coureur bekend om zijn brede glimlach en "shoey"-ritueel, heeft zijn talent bewezen met overwinningen en podiumplaatsen. Zijn ervaring en positieve houding maken Ricciardo een geliefde figuur in de paddock.',
            'team_id' => 8,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Tsunoda',
            'photo' => 'images/Tsunoda.jpg',
            'bio' => 'Yuki Tsunoda',
            'team_id' => 8,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Bottas',
            'photo' => 'images/Bottas.jpg',
            'bio' => 'Valtteri Bottas, de Finse coureur bij Mercedes, staat bekend om zijn solide prestaties en ondersteunende rol in het team. Zijn snelheid en toewijding dragen bij aan het succes van het Mercedes F1-team.',
            'team_id' => 9,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Zhou',
            'photo' => 'images/Zhou.jpg',
            'bio' => 'Guanyu Zhou, de Chinese coureur in de Formule 1, vertegenwoordigt een opkomende generatie talent. Zijn deelname aan de sport draagt bij aan de internationale groei en populariteit van de Formule 1.',
            'team_id' => 9,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Magnussen',
            'photo' => 'images/Magnussen.jpg',
            'bio' => 'Kevin Magnussen, de Deense coureur met F1-ervaring, staat bekend om zijn vastberaden rijstijl. Zijn betrokkenheid bij verschillende teams heeft Magnussen tot een ervaren en gerespecteerde coureur gemaakt.',
            'team_id' => 10,
        ]);

        \App\Models\coureur::factory()->create([
            'name' => 'Hulkenberg',
            'photo' => 'images/Hulkenberg.jpg',
            'bio' => 'Nico Hulkenberg, de Duitse coureur met veel F1-ervaring, staat bekend als een betrouwbare "super-sub". Zijn bereidheid om in te springen bij verschillende teams toont zijn veelzijdigheid en professionaliteit in de autosport.',
            'team_id' => 10,
        ]);

    }
}
