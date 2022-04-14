<?php

require_once 'model/Usuario.php';
require_once 'utils/Utils.php';

class UsuarioController {

	public function index() {
		redirectNotLogged();

		require_once 'view/perfil.view.php';
	}

	public function editarPerfil() {
		redirectNotLogged();

		require_once 'view/editar-perfil.view.php';
	}

	public function store() {
		redirectNotLogged();

		// TODO
	}

	public function get() {
		redirectNotLogged();

		// TODO
	}

	public function update() {
		redirectNotLogged();

		// TODO
	}

	public function destroy() {
		redirectNotLogged();

		// TODO 
	}
}
