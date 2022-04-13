<?php

function redirectNotLogged() {
	session_start();

	if (!isset($_SESSION['id'])) header('Location: /entrar');
}

function redirectLogged() {
	session_start();

	if (isset($_SESSION['id'])) header('Location: /');
}
