<?php

require_once 'utils/Utils.php';
require_once 'utils/Validation.php';
require_once 'utils/theMovies.php';

class CatalogoController {
	public $apiKey = "b4bc80661e9a1024dda361901d105ba0";

	public $errors = [];
	public $success = [];

	public function index() {
		redirectNotLogged();

		$listMovies = theMovies::createCurl("GET", "/movie/popular?api_key=" . $this->apiKey, null);
		require_once 'view/catalogo.view.php';
	}

	public function detalhes() {
		redirectNotLogged();

		require_once 'view/detalhes.view.php';
	}

	public function store() {
		redirectNotLogged();

		// TODO
	}

	public function update() {
		redirectNotLogged();

		// TODO
	}

	public function get() {
		redirectNotLogged();

		// TODO
	}

	public function destroy() {
		redirectNotLogged();

		// TODO
	}

	public function list() {
		redirectNotLogged();
	}
}
