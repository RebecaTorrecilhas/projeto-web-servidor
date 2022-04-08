<?php

class Usuario {

	private $id;
	private $email;
	private $password;
	private $nome;

	public function store() {
		// TODO
	}

	public function update() {
		// TODO
	}

	public function get() {
		// TODO
	}

	public function destroy() {
		// TODO
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

	public function setNome($nome) {
		$this->nome = $nome;
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
		return $this->nome;
	}
}
