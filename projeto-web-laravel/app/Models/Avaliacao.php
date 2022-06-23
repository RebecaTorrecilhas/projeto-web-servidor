<?php

namespace App\Models;

use App\Helpers\TheMovieUtil;
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

	protected $appends = [
		'filme'
	];

	public function getFilmeAttribute() {
		return TheMovieUtil::getMovie($this->attributes['ava_id_filme']);
	}

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'ava_id_usuario');
    }
}
