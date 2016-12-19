<?php

/**
 * @namespace icelus\orm\model\dao
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\Model;

abstract class Entity
{
	protected $resource;
	
	public function __construct() {
		$this->resource = get_class($this);
	}	
}