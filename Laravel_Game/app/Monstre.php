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
        'name','hp', 'degats', 'defense', 'esquive'
    ];
}
