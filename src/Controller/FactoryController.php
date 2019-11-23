<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace Icelus\Controller;

use Icelus\Util\Files;
use Icelus\Util\Utils;

class FactoryController
{
    private $src;
    private $uri;
    private $controller;
    
    public function __construct($src, $uri) 
    {
        $this->src = $src;
        $this->uri = $uri;
    }
	
    public function instantiate() 
    {	
        if (!Files::exists($this->src))
        {
            throw new \ErrorException(sprintf("Controller not found in path \"%s\"", $this->src));
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