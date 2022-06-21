<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AutenticacaoController extends Controller {
	public function login(Request $request) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|exists:usuarios,email|max:255',
			'password' => 'required|string|max:255|min:6'
		]);

		if ($validator->fails()) return response()->json($validator->errors(), 422);

		$usuario = Usuario::where('email', $request->email)->firstOrFail();

		if (!Hash::check($request->password, $usuario->password)) return response()->json(['password' => 'Senha incorreta.'], 422);

		$token = $usuario->createToken('token', ['auth:sanctum'])->plainTextToken;

		return response()->json(['usuario' => $usuario, 'token' => $token]);
	}

	public function logout(Request $request) {
		$request->user()->currentAccessToken()->delete();

		return response(null, 200);
	}

	public function forgotPassword(Request $request) {
	}

	public function changePassword(Request $request) {
	}
}
