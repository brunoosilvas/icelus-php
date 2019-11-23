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

class Strings extends Generic 
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
        return is_string($value) ? true : false;
    }

    public function compare(Type $type)
    {
        $this->compareIsValid($type);

        $compare = false;
        
        if (strcmp($this->value(), $type->value()) == 0)
        {
            $compare = true;
        }

        return $compare;
    }
    
    public function length()
    {
        $length = strlen($this->value());
        return $length;
    }

    public function trim()
    {
        $this->value = trim($this->value);
        return $this->value;
    }
}