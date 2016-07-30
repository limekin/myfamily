<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

// For form types.
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * This controller handles all the things a user can do with his
 * account.
 */
class UsersController extends Controller
{

    /**
     * @Route("/register", name="register")
     */
    public function registerAction() {
        // Create the form for registration.
        $form = $this->createFormBuilder()
            ->add('family_name', TextType::class)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('phone', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm();


        return $this->render('users/register.html.twig', array(
            'form' => $form->createView()
        ));
    }


    



}
