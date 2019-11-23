<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\View;

use Icelus\Bootstrap\Application;
use Icelus\Util\Files;
use Icelus\Util\Arrays;
use Icelus\View\Resource\Resources;

class ViewManeger 
{
    private $uri;
    private $view;
    
    public function __construct($uri) 
    {
        $this->uri = $uri;
        $this->view = array();
    }
    
    public function add($key, $value) 
    {
        $this->view[$key] = $value;
    }
	
    public function get($key) {
        return Arrays::get($key, $this->view);
    }
	
    public function render($view = null) 
    {
        $template = Application::rootDir() . 
            $this->getUri() . ($view == null ? "/index" : ("/" . $view));
			
        if (Files::exists($template, Files::EXTENSION_DEFAULT))
        {
            require_once $template . Files::EXTENSION_DEFAULT;
        }
        else 
        {
            throw new \ErrorException(sprintf("View not found in '%s'", $template));		
        }   
    }

    public function resources()
    {
        return Resources::instance();
    }
	
    public function getUri() 
    {
        return $this->uri;
    }
	
    public function setUri($uri)
    {
        $this->uri = $uri;
    }
	
}