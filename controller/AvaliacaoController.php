<?php

require_once 'model/Avaliacao.php';
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

		$data = [
			'usuario' => $_SESSION['id'],
			'filme' => $_POST['filme'],
			'avaliacao' => $_POST['avaliacao'],
			'comentario' => $_POST['comentario']
		];

		Avaliacao::store($data);

		header('Location: /perfil');
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
