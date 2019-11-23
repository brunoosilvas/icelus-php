<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Util;

use Icelus\Util\Utils;

class Classes 
{
    /**
     * Extract name path of class
     * 
     * @param $class
     * @return 
     */
    public static function namespace($class)
    {
        return get_class($class);
    }
    
    /**
     * Extract name of class in namespace
     * 
     * @param $namespace
     */
    public static function extractNameClass($namespace)
    {
        $defaultIndex = substr_count($namespace, "\\") + 1;
        $defaultNames = explode("\\", $namespace, $defaultIndex);

        return $defaultNames[($defaultIndex - 1)];
    }
    
    /**
     * Normalize name of class
     * 
     * @param $normalize
     */
    public static function class($normalize)
    {
        $class = "";
        $names = explode("-", $normalize);

        foreach ($names as $name)
        {
            $class .= ucfirst($name);		
        }

        return (!empty($class) ? $class : $normalize);
    }
    
    /**
     * Normalize name of method
     * 
     * @param $normalize
     */
    public static function method($normalize)
    {		
        $method = "";
        $names = explode("-", $normalize);
        
        $index = 0;

        foreach ($names as $name)
        {
            if ($index == Utils::DEFAULT_INDEX)
            {
                $method .= strtolower($name);
            }
            else
            {
                $method .= ucfirst($name);
            }
            
            $index++;
        }
        
        return (!empty($method) ? $method : $normalize);
    }

    public static function castFrom(\stdClass $object, $class)
    {
        $class = new \ReflectionClass($class);
        $instance = $class->newInstance();

        foreach($object as $key => $value)
        {
            $property = $class->getProperty($key);
            $property->setAccessible(true);
            $property->setValue($instance, $value);                
        }

        return $instance;
    }
}