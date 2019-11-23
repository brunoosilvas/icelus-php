<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *  
 */

namespace Icelus\Orm\Dialect;

interface Dialect
{
    public function sql();
}