<?php

$path = isset($_SERVER['PATH_INFO']) ? ucfirst(str_replace('/', '', $_SERVER['PATH_INFO'])) : 'Index';

if (!file_exists("./controller/{$path}Controller.php")) {
	header('Location: ' . '/404.php');
}

$class = $path . 'Controller';

$method = isset($_GET['method']) ? $_GET['method'] : 'index';

require_once 'controller/' . $class . '.php';

$obj = new $class();

$obj->$method();
