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

    // relazione transazione ristoranti
    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }

    // relazione categorie ristoranti
    public function category(){
        return $this->belongsToMany('App\Models\Category');
    }

    // fillable
    protected $fillable = [
        'rest_phonenumber', 'rest_email', 'name_restaurant', 'address', 'user_id'
    ];

}
