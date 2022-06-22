<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
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
    }

    public function avaliacoesSeguidores(Request $request) {
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
    }

    public function destroy(Request $request, $id) {
        $avaliacao = Avaliacao::where(['id' => $id, 'ava_id_usuario' => $request->user()->id])->firstOrFail();

        $avaliacao->delete();

        return response(null, 200);
    }
}
