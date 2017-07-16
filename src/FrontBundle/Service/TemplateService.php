<?php
/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 16/07/17
 * Time: 14:58
 */

namespace FrontBundle\Service;

use AppBundle\Entity\ConfigPlatform;

/**
 * Class TemplateService
 * @package FrontBundle\Service
 */
class TemplateService
{
    const TEMPLATE_PLATFORM_STANDARD = '@Front/Platform/standard_index.html.twig';
    const TEMPLATE_PLATFORM_ORGA_CUSTOM = 'Custom/O%id_orga%:O%id_orga%_index.html.twig';
    const TEMPLATE_PLATFORM_EVENT_CUSTOM = 'Custom/O%id_orga%/E%id_evenement%:E%id_evenement%_index.html.twig';
    const TEMPLATE_CUSTOM_PLATFORM_ROOT = 'FrontBundle:Platform/';

    /**
     * @param ConfigPlatform $configPlatform
     * @return string
     */
    public function getTemplate(ConfigPlatform $configPlatform){
        return $this->buildRootTemplate($configPlatform);
    }

    /**
     * @param ConfigPlatform $configPlatform
     * @return string
     * @throws \Exception
     */
    private function buildRootTemplate(ConfigPlatform $configPlatform){
        if($configPlatform->hasTemplateEventCustom()){
            $root = str_replace('%id_orga%', $configPlatform->getIdOrganisateur(), self::TEMPLATE_PLATFORM_EVENT_CUSTOM);
            $root = str_replace('%id_evenement%', $configPlatform->getIdEvenement(), $root);
            return self::TEMPLATE_CUSTOM_PLATFORM_ROOT.$root;
        }
        if($configPlatform->hasTemplateCustom()){
            return self::TEMPLATE_CUSTOM_PLATFORM_ROOT.str_replace('%id_orga%', $configPlatform->getIdOrganisateur(), self::TEMPLATE_PLATFORM_ORGA_CUSTOM);
        }
        return self::TEMPLATE_PLATFORM_STANDARD;
    }
}