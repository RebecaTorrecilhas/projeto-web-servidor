<?php

function validationCadastro($data) {
	$errors = [];

	if (!isset($data['email']) || empty($data['email'])) {
		$errors['email'] = 'E-mail é um campo obrigatório';
	}

	if (!isset($data['password']) || empty($data['password'])) {
		$errors['password'] = 'Senha é um campo obrigatório';
	}

	if (!isset($data['nome']) || empty($data['nome'])) {
		$errors['nome'] = 'Nome é um campo obrigatório';
	}

	return $errors;
}

function validationLogin($data) {
	$errors = [];

	if (!isset($data['email']) || empty($data['email'])) {
		$errors['email'] = 'E-mail é um campo obrigatório';
	}

	if (!isset($data['password']) || empty($data['password'])) {
		$errors['password'] = 'Senha é um campo obrigatório';
	}

	return $errors;
}

function validationEditarPerfil($data) {
	$errors = [];

	if (!isset($data['email']) || empty($data['email'])) {
		$errors['email'] = 'E-mail é um campo obrigatório';
	}

	if (!isset($data['nome']) || empty($data['nome'])) {
		$errors['nome'] = 'Nome é um campo obrigatório';
	}

	return $errors;
}

function validationEsqueceuSenha($data) {
	$errors = [];

	if (!isset($data['email']) || empty($data['email'])) {
		$errors['email'] = 'E-mail é um campo obrigatório';
	}

	return $errors;
}

function validationRecuperarSenha($data) {
	$errors = [];

	if (!isset($data['password']) || empty($data['password'])) {
		$errors['password'] = 'Nova senha é um campo obrigatório';
	}

	if (!isset($data['password_confirmation']) || empty($data['password_confirmation'])) {
		$errors['password_confirmation'] = 'Confirmação de senha é um campo obrigatório';
	}

	if ($data['password'] !== $data['password_confirmation']) {
		$errors['password_confirmation'] = 'As senhas são diferentes';
	}

	return $errors;
}
