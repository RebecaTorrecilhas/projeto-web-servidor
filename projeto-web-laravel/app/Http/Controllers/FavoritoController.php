<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoritoController extends Controller {
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'fav_id_filme' => 'required|integer',
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		$favorito = Favorito::where(['fav_id_filme' => $request->fav_id_filme, 'fav_id_usuario' => $request->user()->id])->first();

		if ($favorito) return response()->json(['fav_id_filme' => ['Esse filme já está favoritado.']], 422);

		$favorito = new Favorito();

		$favorito->fav_id_usuario = $request->user()->id;
		$favorito->fav_id_filme = $request->fav_id_filme;

		$favorito->save();

		return response()->json($favorito);
	}

	public function listar(Request $request) {
		$favoritos = Favorito::where('fav_id_usuario', $request->user()->id)->paginate($request->rows);

		return response()->json($favoritos);
	}

	public function get(Request $request, $id) {
		$favorito = Favorito::where(['id' => $id, 'fav_id_usuario' => $request->user()->id])->firstOrFail();

		return response()->json($favorito);
	}

	public function destroy(Request $request, $id) {
		$favorito = Favorito::where(['id' => $id, 'fav_id_usuario' => $request->user()->id])->firstOrFail();

		$favorito->delete();

		return response(null, 200);
	}
}
