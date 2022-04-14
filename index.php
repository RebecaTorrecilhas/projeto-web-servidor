<?php

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] :  '';

$class = 'IndexController';
$method = 'index';

switch ($path) {
	// Rotas de views
	case '/cadastrar':
		$class = 'AuthController';
		$method = 'cadastrar';

		break;
	case '/entrar':
		$class = 'AuthController';
		$method = 'index';

		break;
	case '/esqueceu-senha':
		$class = 'AuthController';
		$method = 'esqueceuSenha';

		break;
	case '/recuperar-senha':
		$class = 'AuthController';
		$method = 'recuperarSenha';

		break;

	// TODO adicionar a rota das outras views

	// Rotas de ações
	case '/auth/login':
		$class = 'AuthController';
		$method = 'login';

		break;
	case '/auth/logout':
		$class = 'AuthController';
		$method = 'logout';

		break;
	case '/auth/forgotPassword':
		$class = 'AuthController';
		$method = 'forgotPassword';

		break;
	case '/auth/resetPassword':
		$class = 'AuthController';
		$method = 'resetPassword';

		break;
	case '/auth/cadastrar':
		$class = 'AuthController';
		$method = 'store';

		break;
	case '':
		$class = 'IndexController';
		$method = 'index';

		break;
	default:
		header('Location: /404.php');
		return;
}

require_once "controller/{$class}.php";

$obj = new $class();

$obj->$method();
