<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Util;

class Files 
{
    const UPLOAD_MAX_FILE_SIZE = 10;
    const EXTENSION_DEFAULT = ".php";
    const EXTENSION_XML = ".xml";
    const EXTENSION_JSON = ".json";
    
    public static function exists($path, $extension = null)
    {
        return file_exists($path . ($extension == null ? Files::EXTENSION_DEFAULT : $extension));
    }

    public static function upload($path, $key, $name)
    {
        $files = Arrays::get($key, $_FILES);
        
        if ($files["error"] != 0)
        {
            throw new \ErrorException("Upload encountered an unexpected error");
        }
        
        $destination = Utils::rootDir() . $path . $name;
        move_uploaded_file($files["tmp_name"], $destination);
    }
    
    public static function xmlLoad($file)
    {
        $path = Utils::rootDir() . $file . Files::EXTENSION_XML;
        
        if (!file_exists($path))
        {
            throw new \ErrorException(sprintf("XML notfound in directory '%s'", $path));
        }
        
        return simplexml_load_file($path);
    }
    
    public static function jsonLoad($file)
    {
    }
}