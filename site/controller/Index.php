<?php

namespace site\controller;

use icelus\controller\ActionController;
use icelus\orm\SessionFactory;

use site\model\dao\Profissoes;
use site\model\dao\Usuarios;

class Index extends ActionController {
			
	public function action($param) {
				
		echo "<pre>";		
		$profissoes = new Profissoes();
	}	
	
	public function hasSession() {
		
	}
	
	public function hasService() {
	
	}
	
}