<?php

namespace Site\Controller;

use Icelus\Controller\ActionController;
use Site\Model\Rules\Usuarios;

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