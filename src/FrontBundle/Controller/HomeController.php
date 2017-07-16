<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class HomeController
 * @package FrontBundle\Controller
 */
class HomeController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $configs = $this->get('app.config.platform.service')->getAllConfig();
        return $this->render('@Front/Home/index.html.twig', [
            'configs' => $configs
        ]);
    }
}
