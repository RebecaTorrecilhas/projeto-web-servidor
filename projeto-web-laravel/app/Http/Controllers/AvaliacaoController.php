<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Seguidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvaliacaoController extends Controller {
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'ava_avaliacao' => 'required|integer|min:1|max:5',
			'ava_id_filme' => 'required|integer',
			'ava_comentario' => 'required|string|min:3|max:255',
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		$avaliacao = Avaliacao::where(['ava_id_filme' => $request->ava_id_filme, 'ava_id_usuario' => $request->user()->id])->first();

		if ($avaliacao) return response()->json(['ava_id_filme' => ['Esse filme já foi avaliado.']], 422);

		$avaliacao = new Avaliacao();

		$avaliacao->ava_id_usuario = $request->user()->id;
		$avaliacao->ava_id_filme = $request->ava_id_filme;
		$avaliacao->ava_avaliacao = $request->ava_avaliacao;
		$avaliacao->ava_comentario = $request->ava_comentario;

		$avaliacao->save();

		return response()->json($avaliacao);
	}

	public function listar(Request $request) {
		$avaliacoes = Avaliacao::where('ava_id_usuario', $request->user()->id)->paginate($request->rows);

		return response()->json($avaliacoes);
	}

	public function avaliacoesSeguidores(Request $request) {
		$ids = Seguidor::where('seg_id_usuario', $request->user()->id)->pluck('seg_id_seguindo');

		$avaliacoes = Avaliacao::whereIn('ava_id_usuario', $ids)->paginate($request->rows);

		return response()->json($avaliacoes);
	}

	public function update(Request $request, $id) {
		$validator = Validator::make($request->all(), [
			'ava_avaliacao' => 'required|integer|min:1|max:5',
			'ava_comentario' => 'required|string|min:3|max:255',
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		$avaliacao = Avaliacao::where(['id' => $id, 'ava_id_usuario' => $request->user()->id])->firstOrFail();

		$avaliacao->ava_avaliacao = $request->ava_avaliacao;
		$avaliacao->ava_comentario = $request->ava_comentario;

		$avaliacao->save();

		return response()->json($avaliacao);
	}

	public function get(Request $request, $id) {
		$avaliacao = Avaliacao::where(['id' => $id, 'ava_id_usuario' => $request->user()->id])->firstOrFail();

		return response()->json($avaliacao);
	}

	public function destroy(Request $request, $id) {
		$avaliacao = Avaliacao::where(['id' => $id, 'ava_id_usuario' => $request->user()->id])->firstOrFail();

		$avaliacao->delete();

		return response(null, 200);
	}
}
