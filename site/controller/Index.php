<?php

namespace site\controller;

use icelus\controller\ActionController;
use icelus\orm\SessionFactory;

use site\model\dao\Profissoes;
use site\model\dao\Usuarios;

use icelus\orm\type\Integer;
use icelus\orm\type\Strings;

class Index extends ActionController {
			
	public function action($param) {
				
		//echo "<pre>";		
		//$profissoes = new Profissoes();

		//echo var_dump($profissoes);
		$this->view->render();
	}	
	
	public function hasSession() {
		
	}
	
	public function hasService() {
	
	}
	
}