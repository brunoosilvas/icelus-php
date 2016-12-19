<?php

/**
 * @namespace icelus\view\component
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\view\component;

class MenuItem {

	private $menu;
	private $text;
	
	public function __construct($text, Menu $menu = NULL) {
		$this->text = $text;
		$this->menu = $menu;	
	}
	
}