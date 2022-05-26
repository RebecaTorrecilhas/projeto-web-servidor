<?php

require_once 'utils/DB.php';

class Avaliacao {
	private $id;
	private $email;
	private $token;
	private $ava_usuario_id;

	static public function store($data) {
		$db = DB::connect();

		$sql = 'INSERT INTO reset_password(email, token, created_at, updated_at) VALUES(:email, :token, :created, :updated)';

		$query = $db->prepare($sql);

		$query->execute([
			':email' => $data['email'],
			':token' => $data['token'],
			':created' => date("Y-m-d H:i:s"),
			':updated' => date("Y-m-d H:i:s")
		]);

		$id = $db->lastInsertId();

		if ($id) {
			$query = $db->prepare("SELECT * FROM usuarios WHERE id = {$id};");

			$query->execute();

			return $query->fetchObject('ResetPassword');
		}

		return false;
	}

	public function get() {
		if (!$this->email && !$this->token) {
			return false;
		}

		$db = DB::connect();

		$query = $db->prepare("SELECT * FROM reset_password WHERE email = '{$this->email}' AND token = '{$this->token}';");

		$query->execute();

		return $query->fetchObject('ResetPassword');
	}

	public function destroy() {
		$db = DB::connect();

		$query = $db->prepare("DELETE FROM reset_password WHERE id = {$this->id}");

		return $query->execute();
	}

	public function list() {
		$db = DB::connect();

		$query = $db->prepare("SELECT * FROM avaliacoes WHERE ava_usuario_id = {$this->ava_usuario_id}");

		$query->execute();

		return $query->fetchAll();
	}

	public function setUsuario($usuario) {
		$this->ava_usuario_id = $usuario;
	}

	public function getUsuario() {
		return $this->ava_usuario_id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setToken($token) {
		$this->token = $token;
	}

	public function getId() {
		return $this->id;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getToken() {
		return $this->token;
	}
}
