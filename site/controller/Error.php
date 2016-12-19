<?php

namespace Site\Controller;

use Icelus\Controller\ActionController;
use Icelus\Util\Arrays;

class Error extends ActionController {
			
	public function action($param) {
		$this->view->add("title", "Santo Graal");
		
		$this->view->add("error_date", Arrays::get("error_date", $_COOKIE));
		$this->view->add("error_type", Arrays::get("error_type", $_COOKIE));
		$this->view->add("error_message", Arrays::get("error_message", $_COOKIE));
		$this->view->add("error_line", Arrays::get("error_line", $_COOKIE));
		$this->view->add("error_file", Arrays::get("error_file", $_COOKIE));
		
		$this->view->render();
	}
	
	public function add($param) {
		$this->view->add("title", "Santo Graal");
		$this->view->render();
	}
	
	public function hasSession() {
		
	}
	
	public function hasService() {
	
	}
	
}