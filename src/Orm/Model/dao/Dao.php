<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Orm\Model\Dao;

use Icelus\Orm\Model\Entity;

interface Dao 
{
    function find($id);
    /*function findAll();    
    function update(\Entity $entity);
    function save($)
    function remove($id);*/
}