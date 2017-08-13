<?php
/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 09/08/17
 * Time: 00:22
 */

namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CoreControllerTest  extends WebTestCase
{
    public function testInitAction(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/145945/init');
        var_dump($crawler);die;
        $this->assertContains("sqdjkfuyhgsdhgfjklsfkdujd" , $client->getResponse()->getContent());
    }
}