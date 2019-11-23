<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\View\Component;

class Menu 
{
    private $itens;
    
    public function __construct()
    {
        $this->itens = array();
    }
    public function add(MenuItem $item)
    {
        array_push($this->itens, $item);
    }

    public function itens()
    {
        return $this->itens;
    }
}