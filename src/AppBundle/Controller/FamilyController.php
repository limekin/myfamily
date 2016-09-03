<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FamilyController extends Controller
{
    /**
     * @Route("/myfamily", name="myfamily", defaults={"})
     */
    public function homeAction($familykey)
    {
        
        $em = $this->getDoctrine()->getManager();
        


        return $this->render('AppBundle:Family:home.html.twig', array(
            
        ));
    }

}
