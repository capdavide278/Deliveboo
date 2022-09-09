<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // relazione piatti ristoranti
    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }
}
