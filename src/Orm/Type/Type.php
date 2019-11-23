<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace Icelus\Orm\Type;

interface Type 
{
    public function compare(Type $type);
}