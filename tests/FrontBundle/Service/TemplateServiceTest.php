<?php
namespace tests\FrontBundle\Service;

use FrontBundle\Service\TemplateService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use AppBundle\Entity\ConfigPlatform;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 13/08/17
 * Time: 17:20
 */
class TemplateServiceTest extends KernelTestCase{

    public function testGetTemplate(){
        $container = new ContainerBuilder();
        $kernel = new \AppKernel("dev", false);
        $container->set("kernel", $kernel);
        $templateService = new TemplateService($container);
        //test standard template
        $config = new ConfigPlatform();
        $template = $templateService->getTemplate($config, 'index');
        $templateExpected = "@Front/Platform/index.html.twig";
        $this->assertEquals($templateExpected, $template);
        //test custom orga template
        $config->setIdOrganisateur(46798);
        $template = $templateService->getTemplate($config, 'index');
        $templateExpected = "FrontBundle:Platform/Custom/O46798:O46798_index.html.twig";
        $this->assertEquals($templateExpected, $template);
        //test custom Event template
        $config->setIdEvenement(145948);
        $template = $templateService->getTemplate($config, 'index');
        $templateExpected = "FrontBundle:Platform/Custom/O46798/E145948:E145948_index.html.twig";
        $this->assertEquals($templateExpected, $template);
    }

}