<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\http;

use icelus\util\Arrays;

class Request 
{
	private static $instance;
	
	public static function instance()
	{
		if (self::$instance == null)
			self::$instance = new self();
	
		return self::$instance;
	}

	public static function get($key) 
	{
		return Arrays::get($key, $_REQUEST);
	} 
	
	public function getQueryParameter($key) 
	{
		$url = parse_url($_SERVER["REQUEST_URI"]);		
		parse_str(Arrays::get("query", $url), $query);
				
		return Arrays::get($key, $query);				
	}
	
	public function getCookie($key)
	{
		return Arrays::get($key, $_COOKIE);
	}
		
	public static function isAjax()
	{
		return (! empty($_SERVER["HTTP_X_REQUESTED_WITH"]) &&
				(strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest"));
	}
	
	public static function redirect($url, $data) 
	{		
		header("Location: " . $url . $data);
	}
	
}

