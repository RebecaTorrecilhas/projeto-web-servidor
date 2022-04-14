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
