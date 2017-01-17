<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\util;

class Arrays 
{

	public static function get($key, $array) 
	{
		return array_key_exists($key, $array) ? $array[$key] : null;
	}

}