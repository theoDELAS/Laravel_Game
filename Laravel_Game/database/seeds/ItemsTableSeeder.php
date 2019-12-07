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
            'name' => 'Epée',
            'quantite' => 1,
            'degats' => 15,
            'defense' => 0,
            'hp' => 0,
            'esquive' => 0,
        ]);

        Item::create([
            'name' => 'Bouclier',
            'quantite' => 1,
            'degats' => 0,
            'defense' => 10,
            'hp' => 5,
            'esquive' => 3,
        ]);

        Item::create([
            'name' => 'Casque',
            'quantite' => 1,
            'degats' => 0,
            'defense' => 7,
            'hp' => 5,
            'esquive' => 1,
        ]);
    }
}
