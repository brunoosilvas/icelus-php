<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace Icelus\Controller\Route;

use Icelus\Controller\route\RouteInterface;
use Icelus\Controller\FactoryController;
use Icelus\Http\Request;
use Icelus\Util\Classes;

class Route implements RouteInterface
{	
    const KEY_MODULE = "module";
    const KEY_CONTROLLER = "controller";
    const KEY_METHOD = "method";
    const KEY_PARAM = "param";
    const KEY_VIEW = "view";
    const KEY_CLASS = "class";
    
    const CONTROLLER_PATH = "/Controller/";
    const CONTROLLER_PATH_VIEW = "/public/view/";
    const CONTROLLER_METHOD = "action";

    private $config;
    private $factory;
    private $controller;

    public function __construct() 
    {		
        $this->config = array(Route::KEY_MODULE => $this->module(),
            Route::KEY_CONTROLLER => $this->controller(),
            Route::KEY_METHOD => $this->method(),
            Route::KEY_PARAM => $this->param(),
            Route::KEY_VIEW => $this->view()
        );
    }
	
    public function intercept() 
    {		
        $controller = $this->config[Route::KEY_CONTROLLER];

        $this->factory = new FactoryController($controller);
        $this->controller = $this->factory->instantiate();
		
        if ($this->controller instanceof \Icelus\Controller\ActionController)
        {
            $view = $this->config[Route::KEY_VIEW];
            $this->controller->buildViewManager($view);	
        }
		
        $this->dispatch();
    }

    public function dispatch() 
    {
        $method = $this->config[Route::KEY_METHOD];
        $param = $this->config[Route::KEY_PARAM];
        $this->factory->execute($method, $param);
    }
    
    private function module()
    {
        $module = Request::get(Route::KEY_MODULE);
        return $module;
    }
	
    private function controller() 
    {
        $module = $this->module();
        $class = Request::get(Route::KEY_CLASS);
        $class = Classes::class($class);

        $controller = $module;
        $controller .= Route::CONTROLLER_PATH;
        $controller .= $class;

        return $controller;
    }	
	
    private function method() 
    {
        $method = Request::get(Route::KEY_METHOD);
        $method = Classes::method($method);

        return $method == null ? Route::CONTROLLER_METHOD : $method;
    }
	
    private function param() 
    {
        $param = Request::get(Route::KEY_PARAM);
        return $param;
    }

    private function view() 
    {
        $module = $this->module();
        $class = Request::get(Route::KEY_CLASS);

        $view = $module;
        $view .= Route::CONTROLLER_PATH_VIEW;
        $view .= $class;

        return  $view;
    }    
}