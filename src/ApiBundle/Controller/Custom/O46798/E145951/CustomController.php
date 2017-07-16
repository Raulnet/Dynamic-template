<?php

namespace ApiBundle\Controller\Custom\O46798\E145951;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class CustomController
 * @package ApiBundle\Controller\O46798\E145951
 */
class CustomController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
