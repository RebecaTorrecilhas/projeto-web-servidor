<?php

require_once 'model/Usuario.php';
require_once 'utils/Utils.php';
require_once 'utils/Validation.php';

class AuthController {
	public $errors = [];

	public function index() {
		redirectLogged();

		require_once 'view/login.view.php';
	}

	public function cadastrar() {
		redirectLogged();

		require_once 'view/cadastrar.view.php';
	}

	public function login() {
		redirectLogged();

		$this->errors = validationLogin($_POST);

		if (count($this->errors) > 0) {
			AuthController::index();

			return;
		} else {
			$this->errors = [];
		}

		$usuario = new Usuario();

		// TODO conectar DB e remover esse trecho
		$_SESSION['id'] = 1;
		$_SESSION['email'] = 'andre@gmail.com';
		$_SESSION['nome'] = 'Andre';

		header('Location: /');
		return;

		if ($usuario->getPassword() === $_POST['password']) {
			$_SESSION['id'] = $usuario->getId();
			$_SESSION['email'] = $usuario->getEmail();
			$_SESSION['nome'] = $usuario->getNome();

			header('Location: /');
		} else {
			$this->errors['password'] = "Usuário ou senhas incorretos";
		}
	}

	public function store() {
		redirectLogged();

		$this->errors = validationCadastro($_POST);

		if (count($this->errors) > 0) {
			AuthController::cadastrar();

			return;
		} else {
			$this->errors = [];
		}

		$_SESSION['id'] = 1;
		$_SESSION['email'] = 'andre@gmail.com';
		$_SESSION['nome'] = 'Andre';

		header('Location: /');
	}

	public function logout() {
		session_start();

		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['nome']);

		header('Location: /entrar');
	}
}
