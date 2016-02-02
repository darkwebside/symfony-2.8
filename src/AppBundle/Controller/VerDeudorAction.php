<?php
/**
 * Created by PhpStorm.
 * User: darkwebside
 * Date: 24/1/16
 * Time: 5:14
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Deudores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VerDeudorAction extends Controller
{
    /**
     * @Route ("/deudores/{id}", name="deudor")
     */
    public function showAction($id){
        $deudor=$this->getDoctrine()
                 ->getRepository('AppBundle:Deudores')
                 ->find($id);
        if(!$deudor){
            throw $this->createNotFoundException(
                'No No hay deudores que coincidan '.$id
            );
        }
        return $this->render('deudor/deudor.html.twig',array('deudor'=>$deudor));
        //$this->get('templating')->render('deudor/deudor.html.twig',$deudor)

    }

}