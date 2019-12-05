<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monstre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','hp_base', 'hp_max', 'hp_current', 'degat_base', 'degat_max', 'degat_current', 'defense_base', 'defense_max', 'defense_current', 'esquive_base', 'esquive_max', 'esquive_current',
    ];
}
