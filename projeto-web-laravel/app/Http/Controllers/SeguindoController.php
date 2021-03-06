<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeguindoController extends Controller {
	public function follow(Request $request) {
		$validator = Validator::make($request->all(), [
			'seg_id_seguindo' => 'required|integer|exists:usuarios,id',
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		if ($request->seg_id_seguindo === $request->user()->id) return response()->json(['seg_id_seguindo' => ['Você não pode seguir a si mesmo.']], 422);

		$follow = Seguidor::where(['seg_id_seguindo' => $request->seg_id_seguindo, 'seg_id_usuario' => $request->user()->id])->first();

		if ($follow) return response()->json(['seg_id_seguindo' => ['Você já segue esse usuário.']], 422);

		$follow = new Seguidor();

		$follow->seg_id_usuario = $request->user()->id;
		$follow->seg_id_seguindo = $request->seg_id_seguindo;

		$follow->save();

		return response()->json($follow);
	}

	public function unfollow(Request $request, $id) {
		$unfollow = Seguidor::where(['id' => $id, 'seg_id_usuario' => $request->user()->id])->firstOrFail();

		$unfollow->delete();

		return response(null, 200);
	}

	public function seguidores(Request $request) {
		return $this->listaSeguidores($request, $request->user()->id);
	}

	public function seguindo(Request $request) {
		return $this->listaSeguindo($request, $request->user()->id);
	}

	public function listaSeguidores(Request $request, $usuario_id) {
		$seguidores = Seguidor::with('usuario')->where('seg_id_seguindo', $usuario_id)->paginate($request->rows);

		return response()->json($seguidores);
	}

	public function listaSeguindo(Request $request, $usuario_id) {
		$seguindo = Seguidor::with('seguindo')->where('seg_id_usuario', $usuario_id)->paginate($request->rows);

		return response()->json($seguindo);
	}
}
