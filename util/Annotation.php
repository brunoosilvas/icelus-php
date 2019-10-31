<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\util;

class Annotation 
{
    const CHAR_SPLIT = "@";
    const CHAR_JSON_START = "{";
    const CHAR_JSON_END = "}";
    const CHAR_END = ";";
    const CHAR_EMPTY = "";
    
    public static function getInstance(\ReflectionMethod $method)
    {   
        $class = new \stdClass();

        if ($method->getDocComment())
        {   
            $instance = self::getClass($method->getDocComment());
            $data = self::getData($method->getDocComment());

            $class = json_decode($data);
            $class->instance = $instance;            
        }
        
        return $class;
    }

    private static function getClass(string $docComment) : string
    {
        $first = strpos($docComment, Annotation::CHAR_SPLIT);
        $last = strpos($docComment, Annotation::CHAR_JSON_START, $first);
        
        $class = substr($docComment, $first, ($last - $first));
        $class = str_replace(Annotation::CHAR_SPLIT, Annotation::CHAR_EMPTY, $class);
        $class = trim($class);

        return $class;
    }

    private static function getData(string $docDocument) : string 
    {
        $first = strpos($docDocument, Annotation::CHAR_JSON_START);
        $last = strpos($docDocument, Annotation::CHAR_END, $first);

        $data = substr($docDocument, $first, ($last - $first));

        return $data;
    }
    
}