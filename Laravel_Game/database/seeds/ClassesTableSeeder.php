<?php

use App\Classe;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classe::truncate();

        Classe::create([
            'name' => 'Guerrier',
            'hp' => 150,
            'degats' => 10,
            'defense' => 12,
            'esquive' => 8,
            'histoire' => 'Vous avez été élevé dans la caserne du fort Hekiparthos, creusé dans le mont Costpol, surplombant les terres de NakariK.
            Votre éducation vous a permis de perfectionner votre maniement des armes ainsi que d\'obtenir un physique à en faire pâlir les dieux.
            Pour votre 21ème anniversaire, votre maître d\'armes Sotark, vous a donné comme quête de parcourir le monde afin de perfectionner votre art.',
        ]);
        Classe::create([
            'name' => 'Archer',
            'hp' => 100,
            'degats' => 12,
            'defense' => 10,
            'esquive' => 10,
            'histoire' => 'Vous avez grandi dans la magnifique forêt de Falyar, remplies d\'arbres géants habités par la tribu des Taëlyan.
            Votre mode de vie se basant sur la chasse, vous êtes rapidement devenu le meilleur archer de votre tribu.
            Votre chef, Ulore, vous a confié l\'étude de la désolation dans les terres de Gil\' Ead.',
        ]);
        Classe::create([
            'name' => 'Mage',
            'hp' => 80,
            'degats' => 15,
            'defense' => 8,
            'esquive' => 10,
            'histoire' => 'Vous êtes né un soir d\'hiver sous les magnifiques aurores boréales de Nakarik, signe d\'une profonde aptitude pour la magie.
            Des érudits de l\'académie Doaxir sont donc venus vous chercher pour vous formez à ces arcanes et parfaire votre don.
            Vos années passées dans le royaume Ikaru, à flanc de falaise, n\'ont fait qu\'accroître vos envies de liberté et de voyage.',
        ]);
    }
}
