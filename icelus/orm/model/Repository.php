<?php

/**
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 */

use icelus\orm\model\dao\Dao;
use icelus\orm\model\Entity;
use icelus\orm\Sesssion;

class Repository implements Dao
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