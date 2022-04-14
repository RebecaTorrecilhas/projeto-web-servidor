<?php

require_once 'model/Usuario.php';
require_once 'utils/Utils.php';
require_once 'utils/Validation.php';

class AuthController {
	public $errors = [];
	public $success = null;

	public function index() {
		redirectLogged();

		require_once 'view/login.view.php';
	}

	public function cadastrar() {
		redirectLogged();

		require_once 'view/cadastrar.view.php';
	}

	public function esqueceuSenha() {
		redirectLogged();

		require_once 'view/esqueceu-senha.view.php';
	}

	public function recuperarSenha() {
		redirectLogged();

		require_once 'view/recuperar-senha.view.php';
	}

	public function login() {
		redirectLogged();

		requestOnlyPost();

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
		$_SESSION['email'] = $_POST['email'];
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

		requestOnlyPost();

		$this->errors = validationCadastro($_POST);

		if (count($this->errors) > 0) {
			AuthController::cadastrar();

			return;
		} else {
			$this->errors = [];
		}

		$_SESSION['id'] = 1;
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['nome'] = $_POST['nome'];

		header('Location: /');
	}

	public function logout() {
		requestOnlyPost();

		session_start();

		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['nome']);

		header('Location: /entrar');
	}

	public function forgotPassword() {
		redirectLogged();

		requestOnlyPost();

		$this->errors = validationEsqueceuSenha($_POST);

		if (count($this->errors) > 0) {
			AuthController::esqueceuSenha();

			return;
		} else {
			$this->errors = [];
		}

		// TODO

		$this->success = 'Confira sua caixa de e-mail para alterar a senha.';

		AuthController::esqueceuSenha();
	}

	public function resetPassword() {
		redirectLogged();

		requestOnlyPost();

		$this->errors = validationRecuperarSenha($_POST);

		if (count($this->errors) > 0) {
			AuthController::recuperarSenha();

			return;
		} else {
			$this->errors = [];
		}

		// TODO

		$this->success = 'Senha alterada com sucesso!';

		AuthController::recuperarSenha();
	}
}
