<?php

namespace AppBundle\Controller\Ajax;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * This controller handles all the requestrs made via ajax, to validate certain datas.
 */
class CheckerController extends Controller
{
    /**
     * @Route("/ajax/has_family/{familyName}", name="has_family")
     *
     */
    public function hasFamilyAction($familyName) {
        $em = $this->getDoctrine()->getManager();
        $family = $em->getRepository("AppBundle:Family")
            ->findByFamilyName($familyName);
        $responseText = $family == null ? "no" : "yes";
        return new Response($responseText);
   }
}
