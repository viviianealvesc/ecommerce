<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public function user() { // um endereço pertence a apenas um usuario
        return $this->belongsTo('App/Models/User');
    }
}
