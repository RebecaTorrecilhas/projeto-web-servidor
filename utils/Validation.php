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
