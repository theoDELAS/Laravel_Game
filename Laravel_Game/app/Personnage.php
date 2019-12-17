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
        'pseudo', 'lvl_perso', 'hp_base', 'hp_current', 'hp_max', 'degats_base', 'degats_current', 'degats_max', 'defense_base', 'defense_current', 'defense_max', 'esquive_base', 'esquive_current', 'esquive_max', 'histoire_completed',
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


    public function user() {
        return $this->belongsToMany('App\User');
    }

    public function classe() {
        return $this->belongsToMany('App\Classe');
    }

    public function inventaire() {
        return $this->belongsToMany('App\Inventaire');
    }
}
