<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "usuarios";

    protected $fillable = [
        'usu_nome',
        'usu_foto_perfil',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function avaliacoes() {
        return $this->hasMany(Avaliacao::class, 'ava_id_usuario');
    }

    public function favoritos() {
        return $this->hasMany(Favorito::class, 'fav_id_usuario');
    }

    public function seguidores() {
        return $this->hasMany(Seguidor::class, 'seg_id_seguindo');
    }

    public function seguindo() {
        return $this->hasMany(Seguidor::class, 'seg_id_usuario');
    }
}
