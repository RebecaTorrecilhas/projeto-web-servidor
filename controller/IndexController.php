<?php

class IndexController {
	public function index() {
		require 'utils/Utils.php';

		redirectNotLogged();

		require_once 'view/index.view.php';
	}
}
