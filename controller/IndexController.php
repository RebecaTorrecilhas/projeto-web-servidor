<?php
require_once 'utils/Utils.php';

class IndexController {
	public function index() {
		redirectNotLogged();

		require_once 'view/index.view.php';
	}
}
