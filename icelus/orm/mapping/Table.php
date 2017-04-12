<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\mapping;

abstract class Table 
{
	protected $resource;
	
	public function __construct() {
		$this->resource = get_class($this);		
		echo var_dump($this);		
	}	
}