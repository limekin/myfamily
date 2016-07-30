<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * This controller handles the general pages of the site. 
 * Like for example, pages that are accessed by both anonymous and 
 * authenticated users of our site. 
 */
class MainController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction() {
        return $this->render('main/index.html.twig');
    }
}
