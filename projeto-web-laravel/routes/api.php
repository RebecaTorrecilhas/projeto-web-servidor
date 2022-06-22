<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SeguindoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AutenticacaoController::class)->prefix("autenticacao")->group(function () {
	Route::post('/', 'login');
	Route::post('/recuperar-senha', 'forgotPassword');
	Route::post('/alterar-senha', 'changePassword');
});

Route::controller(UsuarioController::class)->group(function () {
	Route::post('/usuario', 'store');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
	Route::controller(AutenticacaoController::class)->prefix("autenticacao")->group(function () {
		Route::post('/logout', 'logout');
	});

	Route::controller(AvaliacaoController::class)->prefix('avaliacao')->group(function () {
		Route::post('/', 'store');
		Route::post('/listar', 'listar');
		Route::post('/avaliacoes-seguidores', 'avaliacoesSeguidores');
		Route::put('/{id}', 'update');
		Route::get('/{id}', 'get');
		Route::delete('/{id}', 'destroy');
	});

	Route::controller(FavoritoController::class)->prefix('favoritos')->group(function () {
		Route::post('/', 'store');
		Route::post('/listar', 'listar');
		Route::get('/{id}', 'get');
		Route::delete('/{id}', 'destroy');
	});

	Route::controller(UsuarioController::class)->prefix('usuario')->group(function () {
		Route::post('/listar', 'listar');
		Route::put('/', 'update');
		Route::get('/', 'get');
		Route::delete('/', 'destroy');
		Route::get('/{id}', 'getUsuario');
		Route::post('/foto', 'storeFoto');
		Route::delete('/foto', 'destroyFoto');
	});

	Route::controller(SeguindoController::class)->prefix('seguidor')->group(function () {
		Route::post('/{id}', 'follow');
		Route::delete('/{id}', 'unfollow');
	});

	Route::controller(FilmeController::class)->prefix('filme')->group(function () {
		Route::post('/listar', 'listar');
		Route::get('/{id}', 'get');
	});
});
