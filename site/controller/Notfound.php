<?php

namespace site\controller;

use icelus\controller\ActionController;
use site\model\rules\Usuarios;

class Notfound extends ActionController {
			
	public function action($param) {
		$this->view->add("title", "Santo Graal");
		$this->view->render();
	}
	
	public function hasSession() {
		
	}
	
	public function hasService() {
	
	}
	
}