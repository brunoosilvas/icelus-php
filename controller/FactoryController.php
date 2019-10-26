<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\controller;

use icelus\util\Files;
use icelus\util\Utils;

class FactoryController
{
    private $uri;
    private $controller;
    
    public function __construct($uri) 
    {
        $this->uri = $uri;
    }
	
    public function instantiate() 
    {		
        if (!Files::exists($this->uri, null))
        {
            throw new \ErrorException(sprintf("Controller not found in path \"%s\"", $this->uri));
        }

        $this->controller = Utils::convertToNamespace($this->uri);
        $this->controller = new $this->controller;

        return $this->controller;
    } 
	
    public function execute($method, $param) 
    {	
        $controller = $this->controller;	
        $reflection = new \ReflectionClass($controller);
        
        if (!$reflection->hasMethod($method))
        {
            $uri = $this->uri;
            throw new \ErrorException(sprintf("Method '%s' in controller '%s' is missing.", $method, $uri));
        }
        
        $method = $reflection->getMethod($method);
        $method->invoke($controller, $param);
    }
}