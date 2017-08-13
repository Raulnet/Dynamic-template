<?php
namespace tests\ApiBundle\Service;

use ApiBundle\Service\ApiService;
use \PHPUnit\Framework\TestCase;
/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 09/08/17
 * Time: 00:09
 */
class ApiServiceTest extends TestCase
{
    public function testAdd(){
        $apiService = new ApiService();
        $result = $apiService->add(10, 15);
        $this->assertEquals(25, $result);
    }
}
