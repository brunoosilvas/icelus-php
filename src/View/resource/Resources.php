<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\View\Resource;

class Resources 
{
    private static $instance;
    
    public static function instance()
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function rootLink()
    {
        return $this->protocol() . $_SERVER["SERVER_NAME"];
    }
    
    public function protocol()
    {
        $protocol = strtolower($_SERVER["SERVER_PROTOCOL"]);
        $protocol = substr($protocol, 0, 5) == "https" ? "https://" : "http://";

        return $protocol;
    }
}