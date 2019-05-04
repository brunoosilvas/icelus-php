<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace Icelus\Controller;

use icelus\http\Request;
use icelus\util\Files;

abstract class ServiceController 
{	
	private $config;
	
	abstract public function action($param);
	
	abstract public function hasTokenValid();
	
	public function moduleToken()
	{
		$this->config = Files::xmlLoad(Request::get("module") . "/config");
		return $this->config->services->token;	
	}
	
}