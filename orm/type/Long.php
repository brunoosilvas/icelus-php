<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\type;

use icelus\orm\type\Generic;

class Long extends Generic 
{
			
	public function __construct($value = null) 
	{
		$this->value = null;
        if ($this->isValid($value)) 
        {
            $this->value = $value;		
        }
	}

	public function value() 
	{
		return $this->value;
	}
	
	public function isValid($value) 
	{
        return is_long($value) ? true : false;
	}
}