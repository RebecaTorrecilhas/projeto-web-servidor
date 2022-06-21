<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller {
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:usuarios,email|max:255',
			'password' => 'required|string|max:255|min:6',
			'usu_nome' => 'required|string|max:255',
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		$usuario = new Usuario();

		$usuario->email = $request->email;
		$usuario->password = bcrypt($request->password);
		$usuario->usu_nome = $request->usu_nome;

		$usuario->save();

		$token = $usuario->createToken('token', ['auth:sanctum'])->plainTextToken;

		return response()->json(['usuario' => $usuario, 'token' => $token]);
	}

	public function listar(Request $request) {
	}

	public function editar(Request $request) {
	}

	public function buscar(Request $request, $id) {
	}

	public function deletar(Request $request) {
		$usuario = Usuario::where('id', $request->user()->id)->firstOrFail();

		$usuario->delete();

		return response(null, 200);
	}
}
