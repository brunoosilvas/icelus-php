<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\mapping;

use icelus\util\Annotation;

class Entity implements Map
{
    private $type;
    
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function doReader() : void
    {
        $reflection = new \ReflectionClass($this->type);

        foreach($reflection->getMethods() as $key => $method) 
        {
            Annotation::getClass($method);
        }

        echo var_dump($this->type);
    }
}