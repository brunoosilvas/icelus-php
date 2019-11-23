<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Orm\Type;

use Icelus\Orm\Type\Generic;

class Boolean extends Generic 
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
        return is_bool($value) ? true : false;
    }
}