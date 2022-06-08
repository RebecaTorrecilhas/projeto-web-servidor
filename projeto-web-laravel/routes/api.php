<?php

use App\Http\Controllers\AutenticacaoController;
use Illuminate\Http\Request;
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

Route::controller(AutenticacaoController::class)->group(function () {
    Route::post('/autenticacao', 'login');
    Route::post('/autenticacao/recuperar-senha', 'forgotPassword');
    Route::post('/autenticacao/alterar-senha', 'changePassword');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
});
