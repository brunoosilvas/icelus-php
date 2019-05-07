<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\controller\Route;

interface Route 
{

	public function intercept();
	
	public function dispatch();

	public function uriController();

	public function methodController();
	
	public function paramController();
	
	public function uriView();
}