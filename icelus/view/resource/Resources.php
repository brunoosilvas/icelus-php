<?php

/**
 * @namespace icelus\view\resource
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\view\resource;

use icelus\util\Utils;

class Resources 
{		
	private static $instance;

	public static function instance() 
	{
		if (self::$instance == null)
			self::$instance = new self();
		
		return self::$instance;
	}
	
	public function rootLink() 
	{
		return $this->protocol() . $_SERVER["SERVER_NAME"];
	}
	
	public function protocol() 
	{
		return strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == "https" ? 
			"https://" : "http://";
	}
}