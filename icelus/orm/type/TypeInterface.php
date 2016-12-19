<?php

/**
 * @namespace icelus\orm\type
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\type;

interface TypeInterface {		
	
	public function compare(Type $type);
	
}