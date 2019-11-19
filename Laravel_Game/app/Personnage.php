<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Personnage extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'lvl_perso', 'user_id', 'histoire_completed', 'classe', 'hp_base', 'hp_max', 'hp_current', 'degat_base', 'degat_max', 'degat_current', 'defense_base', 'defense_max', 'defense_current', 'esquive_base', 'esquive_max', 'esquive_current', 'inventaire_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}
