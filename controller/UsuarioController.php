<?php

require_once 'model/Usuario.php';
require_once 'model/Avaliacao.php';
require_once 'utils/Utils.php';
require_once 'utils/theMovies.php';
require_once 'utils/Validation.php';

class UsuarioController {
	public $errors = [];
	public $success = null;

	public $apiKey = "b4bc80661e9a1024dda361901d105ba0";

	public function index() {
		redirectNotLogged();
		
		$ava = new Avaliacao();
		$ava->setUsuario($_SESSION["id"]);
		$avaliacoes = $ava->list();

		foreach ($avaliacoes as $key => $avaliacao) {
			$movie = theMovies::createCurl("GET", '/movie/' . $avaliacao["ava_filme_id"] . '?api_key=' . $this->apiKey, null);
			$avaliacoes[$key]["movie"] = $movie;
		}

		require_once 'view/perfil.view.php';
	}

	public function editarPerfil() {
		redirectNotLogged();

		$usuario = Usuario::getByEmail($_SESSION['email']);

		require_once 'view/editar-perfil.view.php';
	}

	public function store() {
		redirectNotLogged();

		// TODO
	}

	public function get() {
		redirectNotLogged();

		// TODO
	}

	public function update() {
		redirectNotLogged();

		requestOnlyPost();

		$this->errors = validationEditarPefil($_POST);

		if (count($this->errors) > 0) {
			session_commit();
			UsuarioController::editarPerfil();

			return;
		} else {
			$this->errors = [];
		}

		if (!empty($_FILES["photo"])) {
			$target_dir = "public/images/users/";
			$target_file = $target_dir . basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		}

		$data = [
			'email' => $_POST['email'],
			'nome' => $_POST['nome'],
			'photo' => isset($target_file) ? $target_file : null,
			'password' => !empty($_POST['password']) ? $_POST['password'] : null
		];

		$usuario = new Usuario();

		$usuario->setId($_SESSION['id']);

		$usuario = $usuario->update($data);

		$_SESSION['email'] = $usuario->getEmail();
		$_SESSION['nome'] = $usuario->getNome();

		session_commit();

		$this->success = 'Sucesso! Usuário atualizado.';

		UsuarioController::editarPerfil();
	}

	public function destroy() {
		redirectNotLogged();

		// TODO 
	}
}
