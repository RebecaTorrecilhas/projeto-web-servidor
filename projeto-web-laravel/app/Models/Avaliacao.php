<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model {
    protected $table = "avaliacoes";

    protected $fillable = [
        'ava_id_usuario',
        'ava_id_filme',
        'ava_avaliacao',
        'ava_comentario'
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'ava_id_usuario');
    }
}
