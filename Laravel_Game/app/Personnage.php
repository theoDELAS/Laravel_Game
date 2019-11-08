<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnage extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inventaire()
    {
        return $this->hasOne(Inventaire::class);
    }

}
