<?php

namespace FrontBundle\Controller;

/**
 * Class HomeController
 * @package FrontBundle\Controller
 */
class HomeController extends AbstractController
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
