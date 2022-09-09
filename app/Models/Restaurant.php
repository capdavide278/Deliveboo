<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    // relazione user ristorante
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // relazione piatti ristoranti
    public function dish(){
        return $this->hasMany('App\Models\Dish');
    }

}
