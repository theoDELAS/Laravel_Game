<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model
{
    public function personnage()
    {
        return $this->belongsTo(Personnage::class, 'personnage_id');
    }
}
