<?php

require "vendor/autoload.php";
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
	case '/esqueceu-senha':
		$class = 'AuthController';
		$method = 'esqueceuSenha';

		break;
	case '/recuperar-senha':
		$class = 'AuthController';
		$method = 'recuperarSenha';

		break;
	case '':
		$class = 'IndexController';
		$method = 'index';

		break;
	case '/catalogo':
		$class = 'CatalogoController';
		$method = 'index';

		break;
	case '/catalogo/detalhes':
		$class = 'CatalogoController';
		$method = 'detalhes';

		break;
	case '/avaliacao':
		$class = 'AvaliacaoController';
		$method = 'avaliacao';

		break;
	case '/editar-perfil':
		$class = 'UsuarioController';
		$method = 'editarPerfil';

		break;
	case '/perfil':
		$class = 'UsuarioController';
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
	case '/user/editar-perfil':
		$class = 'UsuarioController';
		$method = 'update';

		break;

	default:
		header('Location: /404.php');
		return;
}

require_once "controller/{$class}.php";

$obj = new $class();

$obj->$method();
