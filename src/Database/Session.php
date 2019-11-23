<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Database;

use Icelus\Orm\Dialect\Dialect;

class Session implements Transaction
{
    private $dbc;
    private $dialect;

    public function __construct(\PDO $dbc, Dialect $dialect) {
        $this->dbc = $dbc;
        $this->dialect = $dialect;
    }

    public function getDbc()
    {
        return $this->dbc;
    }

    public function setDbc(\PDO $dbc)
    {
        $this->dbc = $dbc;
    }

    public function getDialect()
    {
        return $this->dialect;
    }

    public function setDialect(Dialect $dialect)
    {
        $this->dialect = $dialect;
    }

    public function begin()
    {
        $this->getDbc()->beginTransaction();
    }

    public function commit()
    {
        $this->getDbc()->commit();
    }

    public function rollback()
    {
        $this->getDbc()->rollBack(); 
    }

    public function close()
    {
        if ($this->getDbc()->inTransaction())
        {
            $this->rollback();
        }
        
        $this->dbc = null;
    }
}