<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\model\dao;

use icelus\orm\model\Entity;


interface Dao 
{
    function find($id);
    /*function findAll();    
    function update(\Entity $entity);
    function save($)
    function remove($id);*/
}