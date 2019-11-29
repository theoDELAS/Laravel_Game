<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();

        Item::create([
            'nom' => 'Epée',
            'quantite' => 1,
            'degats' => 15,
            'defense' => 0,
            'hp' => 0,
        ]);

        Item::create([
            'nom' => 'Bouclier',
            'quantite' => 1,
            'degats' => 0,
            'defense' => 10,
            'hp' => 5,
        ]);

        Item::create([
            'nom' => 'Casque',
            'quantite' => 1,
            'degats' => 0,
            'defense' => 7,
            'hp' => 5,
        ]);
    }
}
