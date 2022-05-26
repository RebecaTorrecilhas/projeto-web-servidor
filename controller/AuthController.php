<?php

require_once 'model/Usuario.php';
require_once 'model/ResetPassword.php';
require_once 'utils/Utils.php';
require_once 'utils/Validation.php';
require_once 'utils/Mail.php';

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

		$usuario = Usuario::getByEmail($_POST['email']);

		if ($usuario &&  password_verify($_POST['password'], $usuario->getPassword())) {
			$_SESSION['id'] = $usuario->getId();
			$_SESSION['email'] = $usuario->getEmail();
			$_SESSION['nome'] = $usuario->getNome();

			header('Location: /');

			return;
		}

		$this->errors['password'] = "Usuário ou senhas incorretos";

		AuthController::index();
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

		$usuario = Usuario::getByEmail($_POST['email']);

		if ($usuario) {
			$this->errors['email'] = "Esse e-mail já está cadastrado";

			AuthController::cadastrar();

			return;
		}

		$usuario = Usuario::store($_POST);

		$_SESSION['id'] = $usuario->getId();
		$_SESSION['email'] = $usuario->getEmail();
		$_SESSION['nome'] = $usuario->getNome();

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

		try {
			$usuario = Usuario::getByEmail($_POST['email']);

			if ($usuario) {
				$token = getRandomString(128);

				ResetPassword::store(['email' => $_POST['email'], 'token' => $token]);

				$url = $_SERVER['HTTP_ORIGIN'] . "/recuperar-senha?token=$token&email=" . $_POST['email'];

				$mail = Mail::setup();

				$mail->addAddress($_POST['email']);

				$mail->isHTML(true);
				$mail->Subject = 'Redefinir senha - Web Servidor';

				$body = 'Você está recebendo esse e-mail para redefinir sua senha. Caso não foi você desconsiderar esse e-mail. <br />';
				$body .= "<a href='$url' target='_blank'>Clique aqui para alterar sua senha</a>";
				$body .= '<br />Obrigado.';

				$mail->Body = $body;
				$mail->AltBody = "Voce esta recebendo esse e-mail para redefinir sua senha. Caso nao foi voce desconsiderar esse e-mail \n $url \n Obrigado.";

				$mail->send();
			}
		} catch (Exception $e) {
			// CONTINUE
		}

		$this->success = 'Confira seu e-mail para alterar a senha.';

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

		$reset_password = new ResetPassword();

		$reset_password->setEmail($_POST['email']);
		$reset_password->setToken($_POST['token']);

		$exist = $reset_password->get();

		if ($exist) {
			$usuario = Usuario::getByEmail($_POST['email']);

			if ($usuario) {
				$usuario->updatePassword($_POST['password']);
				$reset_password->destroy();

				$this->success = 'Senha alterada com sucesso.';
				$this->errors = [];
			} else {
				$this->errors['error'] = 'Não foi possível encontrar o usuário.';
			}
		} else {
			$this->errors['erro'] = 'Não foi possível validar as informações.';
		}

		AuthController::recuperarSenha();
	}
}
