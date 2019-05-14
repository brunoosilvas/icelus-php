<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\controller\Route;

use icelus\controller\route\Route;
use icelus\controller\FactoryController;
use icelus\http\Request;
use icelus\util\Classes;

class RouteImpl implements Route
{	
    const CONTROLLER_PATH = "/controller/";
    const CONTROLLER_PATH_VIEW = "/public/view/";
    const CONTROLLER_METHOD = "action";
	
    private $config;
    private $factory;
    private $controller;

    public function __construct() 
    {		
	    $this->config = array(
            "module" => $this->module(),
		    "controller" => $this->controller(),
		    "method" => $this->method(),
		    "param" => $this->param(),
		    "view" => $this->view()
        );
    }
	
	public function intercept() 
	{		
        $controller = $this->config["controller"];

		$this->factory = new FactoryController($controller);
		$this->controller = $this->factory->instantiate();
		
		if ($this->controller instanceof \icelus\controller\ActionController)
		{
            $view = $this->config["view"];
 			$this->controller->buildViewManager($view);	
		}
		
		$this->dispatch();
	}
    
    private function scanControllers()
    {

    }
	
	public function dispatch() 
	{
		$this->factory->execute($this->config["method"], $this->config["param"]);
    }
    
    private function module()
    {
        $module = Request::get("module");
        return $module;
    }
	
	private function controller() 
	{
        $module = $this->module();
		$class = Request::get("class");
        $class = Classes::class($class);
        
        $controller = $module . RouteImpl::CONTROLLER_PATH . $class;

		return $controller;
	}	
	
	private function method() 
	{
		$method = Request::get("method");
		$method = Classes::method($method);

		return $method == null ? RouteImpl::CONTROLLER_METHOD : $method;
	}
	
	private function param() 
	{
        $param = Request::get("param");
		return $param;
	}
	
	private function view() 
	{
        $module = $this->module();
        $class = Request::get("class");

        $view = $module . RouteImpl::CONTROLLER_PATH_VIEW . $class;

		return  $view;
	}
	
}