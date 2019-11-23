<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Util;

class Arrays 
{
    public static function get($key, $array)
    {
        return array_key_exists($key, $array) ? $array[$key] : null;
    }
    
    public static function contains($key, $array)
    {
        return array_key_exists($key, $array) ? true : false;
    }
}