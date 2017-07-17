<?php

namespace ApiBundle\Controller\Custom\O46798;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ApiBundle\Controller\CoreController;

/**
 * Class CoreController
 * @package ApiBundle\Controller
 */
class CustomO46798Controller extends CoreController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function initAction(Request $request)
    {
        if(!$this->methodIsAllowed($request, 'GET')) {
            return $this->sendResponse(Response::HTTP_METHOD_NOT_ALLOWED);
        }
        $content = [
            'function api init successfully overide',
            'Viva La Banana !!!',
          ];
        return $this->sendResponse(Response::HTTP_OK, $content);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function customAction(Request $request){
        if(!$this->methodIsAllowed($request, 'GET')) {
            return $this->sendResponse(Response::HTTP_METHOD_NOT_ALLOWED);
        }
        $content = [
            ['id' => 1, 'content' => 'content item 1'],
            ['id' => 2, 'content' => 'content item 2'],
            ['id' => 3, 'content' => 'content item 3'],
        ];
        return $this->sendResponse(Response::HTTP_OK, $content);
    }
}
