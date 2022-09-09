<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // relazione categorie ristoranti
    public function restaurant(){
        return $this->belongsToMany('App\Models\Restaurant');
    }

}
