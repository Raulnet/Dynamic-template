<?php
namespace ApiBundle\Service;

/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 16/07/17
 * Time: 13:23
 */
class ApiService
{
    /**
     * @param float $a
     * @param float $b
     * @return float
     */
    public function add($a, $b){
        return (float)$a+(float)$b;
    }
}