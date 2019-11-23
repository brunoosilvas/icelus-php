<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Database;

interface Transaction
{
    public function begin();
    public function commit();
    public function rollback();
    public function close();
}