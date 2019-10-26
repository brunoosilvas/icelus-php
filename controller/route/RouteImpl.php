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
    const KEY_MODULE = "module";
    const KEY_CONTROLLER = "controller";
    const KEY_METHOD = "method";
    const KEY_PARAM = "param";
    const KEY_VIEW = "view";
    const KEY_CLASS = "class";
    
    const CONTROLLER_PATH = "/controller/";
    const CONTROLLER_PATH_VIEW = "/public/view/";
    const CONTROLLER_METHOD = "action";

    private $config;
    private $factory;
    private $controller;

    public function __construct() 
    {		
        $this->config = array(RouteImpl::KEY_MODULE => $this->module(),
            RouteImpl::KEY_CONTROLLER => $this->controller(),
            RouteImpl::KEY_METHOD => $this->method(),
            RouteImpl::KEY_PARAM => $this->param(),
            RouteImpl::KEY_VIEW => $this->view()
        );
    }
	
    public function intercept() 
    {		
        $controller = $this->config[RouteImpl::KEY_CONTROLLER];

        $this->factory = new FactoryController($controller);
        $this->controller = $this->factory->instantiate();
		
        if ($this->controller instanceof \icelus\controller\ActionController)
        {
            $view = $this->config[RouteImpl::KEY_VIEW];
            $this->controller->buildViewManager($view);	
        }
		
        $this->dispatch();
    }

    public function dispatch() 
    {
        $method = $this->config[RouteImpl::KEY_METHOD];
        $param = $this->config[RouteImpl::KEY_PARAM];
        $this->factory->execute($method, $param);
    }
    
    private function module()
    {
        $module = Request::get(RouteImpl::KEY_MODULE);
        return $module;
    }
	
    private function controller() 
    {
        $module = $this->module();
        $class = Request::get(RouteImpl::KEY_CLASS);
        $class = Classes::class($class);

        $controller = $module;
        $controller .= RouteImpl::CONTROLLER_PATH;
        $controller .= $class;

        return $controller;
    }	
	
    private function method() 
    {
        $method = Request::get(RouteImpl::KEY_METHOD);
        $method = Classes::method($method);

        return $method == null ? RouteImpl::CONTROLLER_METHOD : $method;
    }
	
    private function param() 
    {
        $param = Request::get(RouteImpl::KEY_PARAM);
        return $param;
    }

    private function view() 
    {
        $module = $this->module();
        $class = Request::get(RouteImpl::KEY_CLASS);

        $view = $module;
        $view .= RouteImpl::CONTROLLER_PATH_VIEW;
        $view .= $class;

        return  $view;
    }    
}