<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model {
    protected $table = "favoritos";

    protected $fillable = [
        'fav_id_usuario',
        'fav_id_filme',
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'fav_id_usuario');
    }
}
