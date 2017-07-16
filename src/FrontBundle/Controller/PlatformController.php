<?php

namespace FrontBundle\Controller;

use AppBundle\Entity\ConfigPlatform;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PlatformController
 * @package FrontBundle\Controller
 */
class PlatformController extends Controller
{
    /**
     * @param $idEvenement
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($idEvenement)
    {
        return $this->getShell($idEvenement);
    }

    /**
     * @param $idEvenement
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function getShell($idEvenement){
        $config = $this->get('app.config.platform.service')->getConfig($idEvenement);
        $template = $this->getTemplate($config);

        return $this->render($template, [
            'config' => $config
        ]);
    }

    /**
     * @param ConfigPlatform $configPlatform
     * @return string
     */
    private function getTemplate(ConfigPlatform $configPlatform){
        return $this->get('template.service')->getTemplate($configPlatform);
    }
}
