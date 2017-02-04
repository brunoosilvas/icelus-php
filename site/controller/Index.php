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
		$profissoes = new Profissoes();

		$integer = new Integer(2);

		$string = new Strings("dsadsad");

		echo var_dump($integer);
		echo var_dump($string);
	}	
	
	public function hasSession() {
		
	}
	
	public function hasService() {
	
	}
	
}