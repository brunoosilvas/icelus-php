<?php

/**
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 */

use Icelus\Orm\Model\Dao\Dao;
use Icelus\Orm\Model\Entity;
use Icelus\Orm\Sesssion;

class Repository
{
    private $session;
    private $entity;
    
    public function __construct(Session $session, Entity $entity) {
        $this->session = $session;
        $this->entity = $entity;
    }

    public function find($id)
    {
        
    }
}