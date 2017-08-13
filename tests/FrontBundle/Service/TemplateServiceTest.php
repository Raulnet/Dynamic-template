<?php namespace tests\FrontBundle\Service;

use FrontBundle\Service\TemplateService;
use \PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Tests\ContainerTest;
use AppBundle\Entity\ConfigPlatform;
/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 13/08/17
 * Time: 17:20
 */
class TemplateServiceTest extends TestCase{

    public function getTemplateTest(){
        $container = new ContainerTest();
        $templateService = new TemplateService($container);
        $config = new ConfigPlatform();
        $template = $templateService->getTemplate($config);
        $templateExpected = "bananan";
        $this->assertEquals($templateExpected, $template);
    }

}