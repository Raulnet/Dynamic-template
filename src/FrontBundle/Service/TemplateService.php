<?php
/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 16/07/17
 * Time: 14:58
 */

namespace FrontBundle\Service;

use AppBundle\Entity\ConfigPlatform;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class TemplateService
 * @package FrontBundle\Service
 */
class TemplateService
{
    const TEMPLATE_PLATFORM_STANDARD = '@Front/Platform/%view%.html.twig';
    const TEMPLATE_PLATFORM_ORGA_CUSTOM = 'Custom/O%id_orga%:O%id_orga%_%view%.html.twig';
    const TEMPLATE_PLATFORM_EVENT_CUSTOM = 'Custom/O%id_orga%/E%id_evenement%:E%id_evenement%_%view%.html.twig';
    const TEMPLATE_CUSTOM_PLATFORM_ROOT = 'FrontBundle:Platform/';
    const FILE_CUSTOM_PLATFORM_ROOT = '/Resources/views/Platform/';
    const ENVIRONNEMENT_PROD = "prod";

    /**
     * @var string
     */
    private $environement;

    /**
     * TemplateService constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->environement = $container->get('kernel')->getEnvironment();
    }

    /**
     * @param ConfigPlatform    $configPlatform
     * @param string            $view
     * @return string
     */
    public function getTemplate(ConfigPlatform $configPlatform, $view){
        return $this->buildRootTemplate($configPlatform, $view);
    }

    /**
     * @param ConfigPlatform $configPlatform
     * @param string $view
     * @return string
     */
    private function buildRootTemplate(ConfigPlatform $configPlatform, $view = ''){

        $eventTemplate = $this->getEventTemplate($configPlatform, $view);
        if($eventTemplate){
            return $eventTemplate;
        }
        $orgaTemplate = $this->getOrgaTemplate($configPlatform, $view);
        if($orgaTemplate){
            return $orgaTemplate;
        }
        return str_replace('%view%', $view,  self::TEMPLATE_PLATFORM_STANDARD);
    }

    /**
     * @param ConfigPlatform $configPlatform
     * @param string $view
     * @return bool|string
     */
    private function  getEventTemplate(ConfigPlatform $configPlatform, $view = ''){
        $root = str_replace('%id_orga%', $configPlatform->getIdOrganisateur(), self::TEMPLATE_PLATFORM_EVENT_CUSTOM);
        $root = str_replace('%id_evenement%', $configPlatform->getIdEvenement(), $root);
        $root = str_replace('%view%', $view, $root);
        if($this->hasFile($root)){
            return self::TEMPLATE_CUSTOM_PLATFORM_ROOT.$root;
        }
        return false;
    }

    /**
     * @param ConfigPlatform $configPlatform
     * @param string $view
     * @return bool|string
     */
    private function getOrgaTemplate(ConfigPlatform $configPlatform, $view = ''){
        $root = str_replace('%id_orga%', $configPlatform->getIdOrganisateur(), self::TEMPLATE_PLATFORM_ORGA_CUSTOM);
        $root = str_replace('%view%', $view, $root);
        if($this->hasFile($root)){
            return self::TEMPLATE_CUSTOM_PLATFORM_ROOT.$root;
        }
        return false;
    }

    /**
     * @param string $root
     * @return bool
     */
    private function hasFile($root = ""){
        $filename = str_replace('/Service', '', __DIR__).self::FILE_CUSTOM_PLATFORM_ROOT.str_replace(':', '/', $root);
        return file_exists($filename);
    }
}