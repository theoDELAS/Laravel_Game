<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Classe extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hp_base', 'hp_max', 'hp_current', 'degat_base', 'degat_max', 'degat_current', 'defense_base', 'defense_max', 'defense_current', 'esquive_base', 'esquive_max', 'esquive_current',
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

    public function personnages() {
        return $this->belongsToMany('App\Personnage');
    }
}
