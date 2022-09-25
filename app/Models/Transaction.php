<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name', 'lastname', 'email', 'date', 'address', 'phonenumber', 'total'
    ];
    // relazione transazioni ristoranti
    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }

    // relazione piatti transazioni
    public function dish(){
        return $this->belongsToMany('App\Models\Dish');
    }
}
