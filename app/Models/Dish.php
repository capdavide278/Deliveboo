<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // relazione piatti ristoranti
    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }

    // relazione piatti transazioni
    public function transaction(){
        return $this->belongsToMany('App\Models\Transaction');
    }

    // fillable
    protected $fillable = [
        'name', 'description', 'restaurant_id', 'price', 'is_visible'
    ];
}
