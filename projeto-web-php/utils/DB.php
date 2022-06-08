<?php

class DB {
	static public function connect() {
		//require_once 'utils/Constants.php';

		try {
			return new PDO("mysql:host=localhost;port=3306;dbname=web_servidor;", 'root', '');
			// return new PDO("mysql:host={$db->host};port={$db->port};dbname={$db->database};", $db->username, $db->password);
		} catch (PDFException $e) {
			die($e->getMessage());
		}
	}

	static public function disconnect() {
		// TODO
	}
}
