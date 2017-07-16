<?php

namespace ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CoreController
 * @package ApiBundle\Controller
 */
class CoreController extends AbstractCoreController
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
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab delectus laudantium nemo non porro quasi quis repellat saepe suscipit vel. Ab ad atque fugiat molestiae temporibus voluptas. Inventore modi, quia?',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa et, eum exercitationem fugiat ipsum iste praesentium quaerat velit? Alias animi aut illo inventore iure nulla quia ratione repudiandae rerum soluta.',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi enim esse optio quam recusandae. Cumque dignissimos doloremque doloribus enim, eveniet exercitationem explicabo impedit inventore ipsum iure, omnis totam ullam voluptatibus?',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, consequuntur dignissimos dolor eaque earum facilis in labore magnam molestias mollitia neque nesciunt nostrum officiis pariatur possimus quasi tenetur ullam ut.'
        ];
        return $this->sendResponse(Response::HTTP_OK, $content);

    }
}
