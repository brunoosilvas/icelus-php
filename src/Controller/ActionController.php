<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Controller;

use Icelus\View\ViewManeger;

abstract class ActionController 
{
    protected $view;	

    abstract public function action($param);
	
    public function buildViewManager($uri) 
    {
        $this->view = new ViewManeger($uri);
    }	
}