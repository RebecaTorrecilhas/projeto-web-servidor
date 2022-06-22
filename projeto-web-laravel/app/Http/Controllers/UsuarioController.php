<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

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
		$response = Usuario::paginate($request->items);

		return response()->json($response);
	}

	public function update(Request $request) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|max:255|unique:usuarios,email,' . $request->user()->id,
			'password' => 'nullable|confirmed|string|max:255|min:6',
			'usu_nome' => 'required|string|max:255'
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		$usuario = Usuario::where('id', $request->user()->id)->firstOrFail();

		$usuario->email = $request->email;
		$usuario->usu_nome = $request->usu_nome;

		if (!empty($request->password)) {
			$usuario->password = bcrypt($request->password);
		}

		$usuario->save();

		return response()->json($usuario);
	}

	public function storeFoto(Request $request) {
		$validator = Validator::make($request->all(), [
			'foto' => 'required|image|max:2048'
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		$usuario = Usuario::where('id', $request->user()->id)->firstOrFail();

		$extensao = $request->foto->getClientOriginalExtension();

		$nomeArquivo = uniqid() . ".{$extensao}";

		$request->foto->storeAs('', $nomeArquivo);

		$usuario->usu_foto_perfil = $nomeArquivo;

		$usuario->save();

		return response()->json($usuario);
	}

	public function destroyFoto(Request $request) {
		$usuario = Usuario::where('id', $request->user()->id)->whereNotNull('usu_foto_perfil')->firstOrFail();

		// Verificar porque não apaga
		File::delete($usuario->usu_foto_perfil);

		$usuario->usu_foto_perfil = null;

		$usuario->save();

		return response()->json($usuario);
	}

	public function get(Request $request) {
		return $this->getUsuario($request, $request->user()->id);
	}

	public function getUsuario(Request $request, $id) {
		$usuario = Usuario::with('avaliacoes', 'favoritos', 'seguidores', 'seguindo')->where('id', $id)->firstOrFail();

		return response()->json($usuario);
	}

	public function destroy(Request $request) {
		$usuario = Usuario::where('id', $request->user()->id)->firstOrFail();

		$usuario->delete();

		return response(null, 200);
	}
}
