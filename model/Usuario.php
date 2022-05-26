<?php

require_once 'utils/DB.php';

class Usuario {
	private $id;
	private $email;
	private $password;
	private $usu_nome;
	private $usu_id_foto;

	static public function store($data) {
		$db = DB::connect();

		$sql = 'INSERT INTO usuarios(email, password, usu_nome, created_at, updated_at) VALUES(:email, :senha, :nome, :created, :updated)';

		$query = $db->prepare($sql);

		$query->execute([
			':email' => $data['email'],
			':senha' => password_hash($data['password'], PASSWORD_DEFAULT),
			':nome' => $data['nome'],
			':created' => date("Y-m-d H:i:s"),
			':updated' => date("Y-m-d H:i:s")
		]);

		$id = $db->lastInsertId();

		if ($id) {
			$query = $db->prepare("SELECT * FROM usuarios WHERE id = {$id};");

			$query->execute();

			return $query->fetchObject('Usuario');
		}

		return false;
	}

	public function update() {
		// TODO
	}

	public function get() {
		if (!$this->id) {
			return false;
		}

		$db = DB::connect();

		$query = $db->prepare("SELECT * FROM usuarios WHERE id = {$this->id};");

		$query->execute();

		return $query->fetchObject('Usuario');
	}

	static public function getByEmail($email) {
		$db = DB::connect();

		$query = $db->prepare("SELECT * FROM usuarios WHERE email = '$email';");

		$query->execute();

		return $query->fetchObject('Usuario');
	}

	public function destroy() {
		$db = DB::connect();

		$query = $db->prepare("DELETE FROM usuarios WHERE id = {$this->id}");

		return $query->execute();
	}

	public function updatePassword($password) {
		if (!$this->id) {
			return false;
		}

		$db = DB::connect();

		$sql = "UPDATE usuarios SET password = '" . password_hash($password, PASSWORD_DEFAULT) . "', updated_at = '" . date("Y-m-d H:i:s") . "' WHERE id = {$this->id};";

		$query = $db->prepare($sql);

		$query->execute();

		return $this->get();
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setNome($usu_nome) {
		$this->usu_nome = $usu_nome;
	}

	public function setFoto($usu_id_foto) {
		$this->usu_id_foto = $usu_id_foto;
	}

	public function getId() {
		return $this->id;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getNome() {
		return $this->usu_nome;
	}

	public function getFoto() {
		return $this->usu_id_foto;
	}
}
