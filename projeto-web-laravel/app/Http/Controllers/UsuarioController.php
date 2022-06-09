<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Usuario;

class UsuarioController extends Controller {
    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|unique:usuarios,email|max:255',
            'password' => 'required|string|max:255|min:6',
            'usu_nome' => 'required|string|max:255',
        ]);

        if ($validated) return response()->json($validated, 422);

        $usuario = new Usuario;

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
    }
}
