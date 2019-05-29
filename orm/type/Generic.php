<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\type;

use icelus\orm\type\Type;

abstract class Generic implements Type 
{
    protected $value;

    public abstract function value();

    public abstract function isValid($value);
    
    private function compareIsValid(Type $type) 
    {
        if ($this->value() == null || $type->value() == null)
        {
            throw new \ErrorException(sprintf("Type not compare, this value is 'NULL'."));
        }

        if (!is_a($this, get_class($type)))
        {
            throw new \ErrorException(sprintf("Type not compare, are different."));
        }
    }

    public function compare(Type $type) 
    {
        $this->compareIsValid($type);
        
        $compare = 0;

        if ($this->value() < $type->value()) 
        {
            $compare = -1;
        } 
        else if ($this->value() == $type->value()) 
        {
            $compare = 0;
        }
        else if ($this->value() > $type->value())
        {
            $compare = 1;
        }
        
        return $compare;
    }
}