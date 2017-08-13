<?php

namespace FrontBundle\Controller;

/**
 * Class PlatformController
 * @package FrontBundle\Controller
 */
class PlatformController extends AbstractController
{
    /**
     * @param $idEvenement
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($idEvenement)
    {
        $config = $this->get('app.config.platform.service')->getConfig($idEvenement);
        return $this->view('index', [
            'config' => $config
        ], $idEvenement);
    }

}
