<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\mapping;

use icelus\util\Naming;

class Column implements Naming
{
    private $id;
    private $name;
    private $sequence;   
    private $nullable;
    private $type;
	
	public function __construct() 
	{
		
    }
    
    public static function class()
    {
        return __CLASS__;
    }
}