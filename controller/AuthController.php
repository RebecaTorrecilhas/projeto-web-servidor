<?php

require_once 'model/Usuario.php';

class AuthController {

	public function index() {
		require 'utils/Utils.php';

		redirectLogged();

		require_once 'view/login.view.php';
	}

	public function login() {
		require 'utils/Utils.php';

		redirectLogged();

		//validar formulario

		$usuario = new Usuario();

		// TODO conectar DB
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
			// devolver usuario/senha incorretos
		}
	}

	public function logout() {
		session_start();

		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['nome']);

		header('Location: /auth');
	}
}
