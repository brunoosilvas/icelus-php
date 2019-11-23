<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Util;

class Utils 
{
    const DEFAULT_INDEX = 0;
    
    public static function convertToNamespace($uri)
    {
        return str_replace("/", "\\", $uri);
    }
    
    public static function rootDir()
    {
        return str_replace("\\", "/", $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR);
    }
}