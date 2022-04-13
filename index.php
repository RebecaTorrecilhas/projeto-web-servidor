<?php

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] :  '';

$class = 'IndexController';
$method = 'index';

switch ($path) {
	case '/cadastrar':
		$class = 'AuthController';
		$method = 'cadastrar';

		break;
	case '/entrar':
		$class = 'AuthController';
		$method = 'index';

		break;
	case '/auth/login':
		$class = 'AuthController';
		$method = 'login';
		
		break;
	case '/auth/logout':
		$class = 'AuthController';
		$method = 'logout';

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
