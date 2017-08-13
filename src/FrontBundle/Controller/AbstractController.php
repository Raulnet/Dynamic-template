<?php
/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 13/08/17
 * Time: 19:02
 */

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AbstractController
 * @package FrontBundle\Controller
 */
abstract class AbstractController extends Controller
{
    /**
     * @param $view
     * @param array $params
     * @param null $idEvenement
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function view($view, array $params = [], $idEvenement = null){

        $template = $this->getTemplate($idEvenement, $view);
        return $this->render($template, $params);
    }

    /**
     * @param $idEvenement
     * @param $view
     * @return string
     */
    private function getTemplate($idEvenement, $view){
        $config = $this->get('app.config.platform.service')->getConfig($idEvenement);
        return $this->get('template.service')->getTemplate($config, $view);

    }

}