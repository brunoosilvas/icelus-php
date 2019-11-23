<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace Icelus\Orm\Type;

use Icelus\Orm\Type\Generic;

class Integer extends Generic 
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
        return is_int($value) ? true : false;
    }
}