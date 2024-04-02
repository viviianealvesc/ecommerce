<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function user() { // Um produto pode ser favoritado por varios usuarios
        return $this->belongsToMany('App\Models\User');
    }

    public function shopsUser() { // Um produto pode ter varios usuarios
        return $this->belongsToMany('App\Models\User');
    }

    protected $casts = [
        'cores' => 'array'
    ];
}
