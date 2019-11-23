<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\model;

use icelus\orm\model\dao\Dao;
use icelus\orm\mapping\Table;
use icelus\util\Classes;
use icelus\orm\mapping\Column;

class Entity
{
    private $mappging;

    public function __construct() 
    {
   
        $temp = new \ReflectionClass(Classes::namespace($this));

        //echo var_dump($temp->getDocComment());
        //echo var_dump($temp->getMethod("getPerfis")->getDocComment());

        /* echo var_dump($temp->getProperties());

        foreach($temp->getProperties() as $key => $propertie) {
            echo var_dump($propertie->getDocComment());
        } */

        foreach($temp->getMethods() as $key => $method) 
        {
            if ($method->getDocComment()) {
                //echo var_dump($method->getDocComment());

                //$result = "";
               // preg_match_all('/var skuJson = {(.*?)\}\;/', $result, $method->getDocComment());
                //echo var_dump($result);
               
                // preg_match_all('/\*(\*)?(((?!\*/)[\s\S])+)?\*/', $method->getDocComment(), $out, PREG_PATTERN_ORDER);
                // echo var_dump($out);

               // echo var_dump(strpos($method->getDocComment(), "("));

                //$string = preg_replace("/[><;!?*%~^`\/\n\r]/", "", $method->getDocComment());
                //$string = trim(preg_replace("/\t+/", "", $string));
                $string = $method->getDocComment();
                
                $first = strpos($string, "@");
                $last = strpos($string, "(");

                $result = substr($string, 
                    $first, ($last - $first));

                echo var_dump($result);

                $first = strrpos($string, "{");
                $last = strrpos($string, ")");
                
                //echo var_dump($first);
                //echo var_dump($last);
                //echo var_dump(strlen($string));

                $result2 = substr($string, 
                    $first, ($last - $first));

                 echo var_dump($result2);

                 //var_dump();
                 $object = json_decode($result2);

                 $temp = Classes::castFrom($object, Column::class());
                 echo var_dump($temp);
            }
        }

    }
}