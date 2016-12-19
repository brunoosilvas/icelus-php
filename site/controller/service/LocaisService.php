<?php

namespace Site\Controller\Services;

use Icelus\Controller\ServiceController;
use Icelus\Http\Request;

class LocaisService extends ServiceController {
			
	public function action($param) 
	{
		
	}
	
	public function listAll($param)
	{
		echo "aqui.. list all   " . $param;
	}
	
	public function listAllTeste()
	{
		echo "aqui.. list all teste";
	}
	
	public function hasTokenValid() 
	{
		return $this->moduleToken() == Request::get("token");
	}
	
}