<?php

require_once 'utils/Utils.php';
require_once 'utils/Validation.php';

class AvaliacaoController {
	public $errors = [];
	public $success = [];

	public function index() {
		redirectNotLogged();

		require_once 'view/avaliacao.view.php';
	}

	public function avaliar() {
		redirectNotLogged();

		// TODO
	}

	public function update() {
		// TODO
	}

	public function get() {
		// TODO
	}

	public function destroy() {
		// TODO
	}

	public function list() {
		// TODO
	}
}
