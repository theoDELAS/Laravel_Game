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
            'hp_base' => 150,
            'hp_max' => 150,
            'hp_current' => 150,
            'degat_base' => 10,
            'degat_max' => 10,
            'degat_current' => 10,
            'defense_base' => 12,
            'defense_max' => 12,
            'defense_current' => 12,
            'esquive_base' => 8,
            'esquive_max' => 8,
            'esquive_current' => 8,
        ]);
        Monstre::create([
            'name' => 'Dragon',
            'hp_base' => 100,
            'hp_max' => 100,
            'hp_current' => 100,
            'degat_base' => 12,
            'degat_max' => 12,
            'degat_current' => 12,
            'defense_base' => 10,
            'defense_max' => 10,
            'defense_current' => 10,
            'esquive_base' => 10,
            'esquive_max' => 10,
            'esquive_current' => 10,
        ]);
        Monstre::create([
            'name' => 'Soldat',
            'hp_base' => 80,
            'hp_max' => 80,
            'hp_current' => 80,
            'degat_base' => 15,
            'degat_max' => 15,
            'degat_current' => 15,
            'defense_base' => 8,
            'defense_max' => 8,
            'defense_current' => 8,
            'esquive_base' => 10,
            'esquive_max' => 10,
            'esquive_current' => 10
        ]);
    }
}
