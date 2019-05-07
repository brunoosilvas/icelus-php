<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\util;

use icelus\util\Utils;

class Classes 
{

	/**
	 * Extract name path of class
	 *
	 * @param object $class
	 * @return string
	 */
	public static function namespace($class) 
	{
		return get_class($class);
	}
	
	/**
	 * Extract name of class in namespace
	 *
	 * @param string $namespace
	 * @return string
	 */
	public static function extractNameClass($namespace) 
	{
		$defaultIndex = substr_count($namespace, "\\") + 1;
		$defaultNames = explode("\\", $namespace, $defaultIndex);
	
		return $defaultNames[($defaultIndex - 1)];
	}
	
	/**
	 * Normalize name of class
	 *
	 * @param string $normalize
	 * @return string
	 */
	public static function class($normalize) 
	{
		$class = "";
		$names = explode("-", $normalize);
		
		foreach ($names as $name)
		{
			$class .= ucfirst($name);		
		}
		
		return (!empty($class) ? $class : $normalize);
	}
	
	/**
	 * Normalize name of method
	 *
	 * @param string $normalize
	 * @return string
	 */
	public static function method($normalize) 
	{		
		$method = "";		
		$names = explode("-", $normalize);
		
		$index = 0;
		foreach ($names as $name) 
		{
			if ($index == Utils::DEFAULT_INDEX)
			{
				$method .= strtolower($name);
			}
			else
			{
				$method .= ucfirst($name);
			}		
			$index++;
		}	
		
		return (!empty($method) ? $method : $normalize);
	}
}