<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Http;

use Icelus\Http\Request;

class Response 
{
	public static function fromJson($data) {
		header("Content-Type: application/json");
		echo json_encode($data); 
	}
}
