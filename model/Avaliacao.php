<?php

require_once 'utils/DB.php';

class Avaliacao {
	private $id;
	private $ava_usuario_id;
	private $ava_filme_id;
	private $ava_avaliacao;
	private $ava_comentario;

	static public function store($data) {
		$db = DB::connect();

		$sql = 'INSERT INTO avaliacoes(ava_usuario_id, ava_filme_id, ava_avaliacao, ava_comentario, created_at, updated_at) VALUES(:usuario, :filme, :avaliacao, :comentario, :created, :updated)';

		$query = $db->prepare($sql);

		$query->execute([
			':usuario' => $data['usuario'],
			':filme' => $data['filme'],
			':avaliacao' => $data['avaliacao'],
			':comentario' => $data['comentario'],
			':created' => date("Y-m-d H:i:s"),
			':updated' => date("Y-m-d H:i:s")
		]);

		$id = $db->lastInsertId();

		if ($id) {
			$query = $db->prepare("SELECT * FROM avaliacoes WHERE id = {$id};");

			$query->execute();

			return $query->fetchObject('Avaliacao');
		}

		return false;
	}

	public function get() {
		if (!$this->id) {
			return false;
		}

		$db = DB::connect();

		$query = $db->prepare("SELECT * FROM avaliacoes WHERE id = '{$this->id}';");

		$query->execute();

		return $query->fetchObject('Avaliacao');
	}

	public function destroy() {
		$db = DB::connect();

		$query = $db->prepare("DELETE FROM avaliacoes WHERE id = {$this->id}");

		return $query->execute();
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setUsuario($usuario) {
		$this->ava_usuario_id = $usuario;
	}

	public function setFilme($filme) {
		$this->ava_filme_id = $filme;
	}

	public function setAvaliacao($avaliacao) {
		$this->ava_avaliacao = $avaliacao;
	}

	public function setComentario($comentario) {
		$this->ava_comentario = $comentario;
	}

	public function getId() {
		return $this->id;
	}

	public function getUsuario() {
		return $this->ava_usuario_id;
	}

	public function getFilme() {
		return $this->ava_filme_id;
	}

	public function getAvaliacao() {
		return $this->ava_avaliacao;
	}

	public function getComentario() {
		return $this->ava_comentario;
	}
}
