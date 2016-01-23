<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       $usuario_logeado= $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY');
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'loged_user' => $usuario_logeado,
        ]);

    }
}
