<?php

namespace ApiBundle\Controller\Custom\O46798;

use ApiBundle\Controller\CoreController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CustomController
 * @package ApiBundle\Controller\O46798
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
            'Method init successfully overide'
        ];
        return $this->sendResponse(Response::HTTP_OK, $content);

    }

    /**
     * @param Request $request
     * @return Response
     */
    public function customAction(Request $request)
    {
        if(!$this->methodIsAllowed($request, 'GET')) {
            return $this->sendResponse(Response::HTTP_METHOD_NOT_ALLOWED);
        }
        $content = [
            'message' => 'Content From customAction Orga O46798',
            'content' => 'hello from customController Bundle'
        ];
        return new Response(
            json_encode($content),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }
}
