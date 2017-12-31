<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm;

use icelus\orm\dialect\mysql;
use icelus\orm\dialect\Dialect;

class Session
{
    private $dbc;
    private $dialect;

    public function __construct($dbc, \Dialect $dialect) {
        $this->dbc = $dbc;
        $this->$dialect = $dialect;
    }
}