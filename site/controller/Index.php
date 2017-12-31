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
				
		echo "<pre>";		
		//$profissoes = new Profissoes();

		$sessionFactory = SessionFactory::instance();
		$sessionFactory->configu
		
		
		//$this->view->render();
	}	
	
	public function hasSession() {
		
	}
	
	public function hasService() {
	
	}
	
}