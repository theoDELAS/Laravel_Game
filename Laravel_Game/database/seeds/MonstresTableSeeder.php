<?php

use App\Monstre;
use Illuminate\Database\Seeder;

class MonstresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Monstre::truncate();

        Monstre::create([
            'name' => 'Loup',
            'hp' => 150,
            'degats' => 10,
            'defense' => 12,
            'esquive' => 8,
        ]);
        Monstre::create([
            'name' => 'Dragon',
            'hp' => 100,
            'degats' => 12,
            'defense' => 10,
            'esquive' => 10,
        ]);
        Monstre::create([
            'name' => 'Soldat',
            'hp' => 80,
            'degats' => 13,
            'defense' => 8,
            'esquive' => 10,
        ]);
    }
}
