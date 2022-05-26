<?php

function redirectNotLogged() {
	session_start();

	if (!isset($_SESSION['id'])) header('Location: /entrar');
}

function redirectLogged() {
	session_start();

	if (isset($_SESSION['id'])) header('Location: /');
}

function requestOnlyGet() {
	if ($_SERVER['REQUEST_METHOD'] !== 'GET') header('Location: /404.php');
}

function requestOnlyPost() {
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') header('Location: /404.php');
}

function getRandomString($size) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';

	for ($i = 0; $i < $size; $i++) {
		$index = rand(0, strlen($characters) - 1);
		$randomString .= $characters[$index];
	}

	return $randomString;
}
