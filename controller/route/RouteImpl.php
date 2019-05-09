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
use icelus\http\Response;

class RouteImpl implements Route
{	
	const CONTROLLER_DEFAULT = "/controller/";
	const CONTROLLER_DEFAULT_METHOD = "action";
	const CONTROLLER_DEFAULT_VIEW = "/public/views/";
	
	private $config;
	private $factory;
	private $controller;

	public function __construct() 
	{		
		$this->config = array(
			"controller" => $this->uriController(),
			"method" => $this->methodController(),
			"param" => $this->paramController(),
			"view" => $this->uriView()
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
	
	
	public function dispatch() 
	{
		$this->factory->execute($this->config["method"], $this->config["param"]);
	}
	
	public function uriController() 
	{
		$class = Request::get("class");
		$class = Classes::class($class);

		return Request::get("module") . RouteImpl::CONTROLLER_DEFAULT . $class;
	}	
	
	public function methodController() 
	{
		$method = Request::get("method");
		$method = Classes::method($method);

		return Request::get("method") == null ? RouteImpl::CONTROLLER_DEFAULT_METHOD : $method;
	}
	
	public function paramController() 
	{
		return Request::get("param");
	}
	
	public function uriView() 
	{
		return Request::get("module") . RouteImpl::CONTROLLER_DEFAULT_VIEW . Request::get("class");
	}
	
}