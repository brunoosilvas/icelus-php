<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\model;

use icelus\orm\model\dao\Dao;

abstract class Entity implements Dao
{
	protected $resource;
	
	public function __construct() {
		$this->resource = get_class($this);
		echo var_dump($this);		
	}	
}