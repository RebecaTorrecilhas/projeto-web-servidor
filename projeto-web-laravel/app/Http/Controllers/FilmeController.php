<?php

namespace App\Http\Controllers;

use App\Helpers\TheMovieUtil;
use Illuminate\Http\Request;

class FilmeController extends Controller {
	public function listarPopulares(Request $request) {
		return response()->json(TheMovieUtil::getPopulars());
	}

	public function buscarFilmes(Request $request) {
		return response()->json(TheMovieUtil::getMovies($request->search, $request->page));
	}

	public function get(Request $request, $id) {
		return response()->json(TheMovieUtil::getMovie($id));
	}
}
