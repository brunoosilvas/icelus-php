<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\mapping;

class Table 
{
	private $name;
	private $schema;
	private $view;
	
	public function __construct() 
	{
		$this->resource = get_class($this);		
		echo var_dump($this);		
	}	
}