<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopUser extends Model
{
    use HasFactory; 

    protected $table = 'shop_user'; // Especifica o nome da tabela

    public $timestamps = false;

    protected $fillable = ['user_id', 'shop_id', 'quantity', 'valor'];

    protected $primaryKey = 'shop_id';


    // Define o relacionamento com o modelo de usuário
    // public function user()
     //{
     //    return $this->belongsTo(User::class, 'user_id');
     //}

    // Define o relacionamento com o modelo de produto
     //public function product()
     //{
     //    return $this->belongsTo(Shop::class, 'shop_id'); // Especifica o nome da coluna chave estrangeira
    // }
}