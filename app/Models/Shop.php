<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function users() { // Um produto pode ser favoritado por varios usuarios
        return $this->belongsToMany(Shop::class, 'user_shop');
    }

    public function shopsUser() { // Um produto pode ter varios usuarios (carrinho)
        //return $this->belongsToMany('App\Models\User');
        return $this->belongsToMany(User::class, 'shop_user');
    }

    protected $casts = [
        'cores' => 'array'
    ];

    protected $images = [
        'image' => 'array'
    ];
}
