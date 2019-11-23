<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus-php
 *
 */

namespace Icelus\Orm\Mapping;

interface MapInterface
{
    function doReader() : void;

    /*function getTable() : Table;

    function getColumn(string $property) : Column;

    function getColumns() : array;

    function getForeign(string $property) : Foreign;

    function getForeigns() : ?array;*/
}