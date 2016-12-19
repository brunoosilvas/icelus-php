<?php


namespace icelus\controller\Route;

use icelus\controller\route\RouteInterface;
use icelus\controller\FactoryController;
use icelus\http\Request;
use icelus\util\Classes;
use icelus\http\Response;

class RouteImpl implements RouteInterface
{	
	private $config;
	private $factory;
	private $controller;

	const CONTROLLER_DEFAULT_URI = "/controller/";
	const CONTROLLER_AJAX_URI = "/controller/Ajax/";
	const CONTROLLER_SERVICES_URI = "/controller/Service/";
	
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
		
		$this->factory = new FactoryController($this->config["controller"]);
		$this->controller = $this->factory->instantiate();
		
		if ($this->controller instanceof \icelus\controller\ActionController)
			$this->controller->buildViewManager($this->config["view"]);	
		
		$this->dispatch();
	}
	
	
	public function dispatch() 
	{
		if ($this->controller instanceof \icelus\controller\ServiceController)
		{
			if (!$this->controller->hasTokenValid())
			{
				Response::fromJson(
					array("warning" => "Request invalid token.")
				);		
				return;
			}
				
		}			
		$this->factory->execute($this->config["method"], $this->config["param"]);
	}
	
	public function uriController() 
	{
		$uri = Request::get("token") != null ? 
			self::CONTROLLER_SERVICES_URI : (Request::isAjax() ? 
					self::CONTROLLER_AJAX_URI : self::CONTROLLER_DEFAULT_URI);
		return Request::get("module") . $uri . Classes::name(Request::get("class"));
	}	
	
	public function methodController() 
	{
		return Request::get("method") == null ? "action" : Classes::method(Request::get("method"));
	}
	
	public function paramController() 
	{
		return Request::get("param");
	}
	
	public function uriView() 
	{
		return Request::get("module") . "/public/views/" . Request::get("class");
	}
	
}