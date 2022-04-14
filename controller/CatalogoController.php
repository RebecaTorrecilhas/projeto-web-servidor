<?php

require_once 'utils/Utils.php';
require_once 'utils/Validation.php';

class CatalogoController {
	public $errors = [];
	public $success = [];

	public function index() {
		redirectNotLogged();

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

		// TODO
	}
}
