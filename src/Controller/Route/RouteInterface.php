<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\controller\Route;

interface RouteInterface
{
    public function intercept();
	
    public function dispatch();
}