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
    const CHAR_START_JSON = "{";
    const CHAR_END_JSON = "}";
    const CHAR_EMPTY = "";
    
    public static function getClass(\ReflectionMethod $method)
    {   
        $class = new \stdClass();

        if ($method->getDocComment())
        {   
            $instance = self::extractClass($method->getDocComment());
            $data = self::extractData($method->getDocComment());

            $class = json_decode($data);
            $class->instance = $instance;            
        }

        echo var_dump($class);

        return $class;
    }

    private static function extractClass(string $docComment) : string
    {
        $first = strpos($docComment, Annotation::CHAR_SPLIT);
        $last = strpos($docComment, Annotation::CHAR_START_JSON, $first);
        
        $class = substr($docComment, $first, ($last - $first));
        $class = str_replace(Annotation::CHAR_SPLIT, Annotation::CHAR_EMPTY, $class);

        return $class;
    }

    private static function extractData(string $docDocument) : string 
    {
        $first = strpos($docDocument, Annotation::CHAR_START_JSON);
        $last = strpos($docDocument, Annotation::CHAR_SPLIT, $first);

        $data = substr($docDocument, $first, ($last - $first));

        return $data;
    }
    
}