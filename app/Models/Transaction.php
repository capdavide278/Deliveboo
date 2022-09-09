<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // relazione transazioni ristoranti
    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }

    // relazione piatti transazioni
    public function dish(){
        return $this->belongsToMany('App\Models\Dish');
    }
}
