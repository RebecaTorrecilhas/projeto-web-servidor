<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model {
    protected $table = "seguidores";

    protected $fillable = [
        'seg_id_usuario',
        'seg_id_seguindo',
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'seg_id_usuario');
    }

    public function seguindo() {
        return $this->belongsTo(Usuario::class, 'seg_id_seguindo');
    }
}
