<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\ConfigPlatform;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RouteController
 * @package ApiBundle\Controller
 */
class RouteController extends AbstractCoreController
{
    const ROOT_CORE_ACTION_CONTROLLER = 'ApiBundle:Core:';
    const ROOT_CUSTOM_ACTION_CONTROLLER = 'ApiBundle:Custom/O%id_organisateur%/CustomO%id_organisateur%:';

    /**
     * @param Request   $request
     * @param int       $idEvenement
     * @param null      $action
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function rootAction(Request $request,$idEvenement,  $action = null){
        if($action === null ){
            return $this->sendResponse(Response::HTTP_BAD_REQUEST);
        }
        return $this->getActionControllerResponse($request, $idEvenement, $action);
    }

    /**
     * @param Request   $request
     * @param int       $idEvenement
     * @param string    $action
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function getActionControllerResponse(Request $request, $idEvenement, $action){
        $actionController = $this->findActionController($idEvenement, $action);
        return $this->forward($actionController, [
            'Request' => $request
        ]);
    }

    /**
     * @param int       $idEvenement
     * @param string    $action
     * @return string
     */
    private function findActionController($idEvenement, $action){
        $config = $this->get('app.config.platform.service')->getConfig($idEvenement);
        if($config->hasApiCustom()){
            return $this->buildRootActionController($config, $action);
        }
        return self::ROOT_CORE_ACTION_CONTROLLER.$action;
    }

    /**
     * @param ConfigPlatform    $config
     * @param string            $action
     * @return string
     */
    private function buildRootActionController(ConfigPlatform $config, $action){
        $root = str_replace('%id_organisateur%', $config->getIdOrganisateur(), self::ROOT_CUSTOM_ACTION_CONTROLLER);
        return $root.$action;
    }
}
