<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Orm\mapping;

use Icelus\Util\Annotation;

class Entity implements MapInterface
{
    private $type;
    
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function doReader() : void
    {
        echo var_dump($_ENV);
        $reflection = new \ReflectionClass($this->type);

        foreach($reflection->getMethods() as $key => $method) 
        {
           if ($method->getDocComment())
           {
                echo var_dump(Annotation::getInstance($method));
           }
            
        }

        
    }
}