<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints\NotBlank;



/**
 * This controller handles all the aspects of user authentication.
 */
class AccountsController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request) {
        // Get info on previous login form submission.
        $authUtils = $this->get('security.authentication_utils');
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        $loginForm = $this->createFormBuilder()
            ->add('_username', TextType::class, array(
                'constraints' => new NotBlank()
            ))
            ->add('_password', PasswordType::class, array(
                'constraints' =>  new NotBlank
            ))
            ->add('submit', SubmitType::class)
            ->getForm();
        $loginForm->handleRequest($request);

        return $this->render("auth/login.html.twig", array(
            'form' => $loginForm->createView(),
            'lastUsername' => $lastUsername,
            'error' => $error
        ));
    }

    /**
     * @Route("/verify", name="verify")
     */
    public function verifyAction() {
        return $this->render("auth/verify.html.twig");
    }

    /**
     * @Route("/confirm/{token}", name="confirm")
     */
    public function confirmAction($token) {
        $em = $this->getDoctrine()->getManager();
        $confirmRepo = $em->getRepository('AppBundle:Confirmation');
        $userRepo = $em->getRepository('AppBundle:User');
        $confirmation = $confirmRepo->findOneByToken($token);
        if(! $confirmation) $this->redirectToRoute('index');

        $currentTime = time();
        $user = $userRepo->find($confirmation->getUserId()); 
        if( $currentTime - $confirmation->getExpiry() < 60 * 60 * 24) {
            $user->setVerified(1);
            $session = $this->get('session');
            $session->set('id', $user->getUserId());
            $em->flush();
            return $this->redirectToRoute('dashboard');
        }

        return $this->verifAction();
    }
}
