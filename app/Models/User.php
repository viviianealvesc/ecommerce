<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Livewire\Volt\Exceptions\ReturnNewClassExecutionEndingException;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    public function shops() { // O usuario pode ter varios produtos favoritados
        return $this->belongsToMany(Shop::class, 'user_shop');
    }

    public function shopUsers() { //(Mostra os produtos) O usuario pode ter varios produtos no carrinho
        return $this->belongsToMany(Shop::class);
    }

    public function shopUserCarrinho() { //(Adiciona os produtos) O usuario pode ter varios produtos no carrinho
        return $this->hasMany(ShopUser::class, 'user_id');
    }

    public function enderecos() { // O usuario pode ter "muitos" endereços
        return $this->hasMany('App\Models\Endereco');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
