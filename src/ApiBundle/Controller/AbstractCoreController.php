<?php
/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 16/07/17
 * Time: 12:42
 */

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AbstractCoreController
 * @package ApiBundle
 */
abstract class AbstractCoreController extends Controller
{
    /**
     * @param Request $request
     * @param $method
     * @return bool
     */
    public function methodIsAllowed(Request $request, $method){
        if($request->getMethod() === $method){
            return true;
        }
        return false;
    }

    /**
     * @param int $response
     * @param array $content
     * @return Response
     */
    public function sendResponse($response = Response::HTTP_METHOD_NOT_ALLOWED, array $content = [] ){
        return new Response(
            json_encode($content),
            $response,
            ['content-type' => 'application/json']
        );
    }
}