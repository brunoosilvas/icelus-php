<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\controller;

use icelus\view\ViewManeger;

abstract class ActionController 
{
	protected $view;	
		
	abstract public function action($param);
	
	public function buildViewManager($uri) 
	{
		$this->view = new ViewManeger($uri);
	}	
}