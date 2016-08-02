<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
// For form types.
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
// For validation
use Symfony\Component\Validator\Constraints\NotBlank;
// For the request object.
use Symfony\Component\HttpFoundation\Request;
// For the User entity.
use AppBundle\Entity\User;
use AppBundle\Entity\Family;

/**
 * This controller handles all the things a user can do with his
 * account.
 *
 * Routes will be defined in the upper section of the class definition.
 * Private methods (utitlies and helpers) will be defined at the lower portion.
 */
class UsersController extends Controller
{

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request) {
        // Create the form for registration.
        $form = $this->createFormBuilder()
            ->add('family_name', TextType::class, array(
                'constraints' => new NotBlank()
            ))
            ->add('name', TextType::class, array(
                'constraints' =>  new NotBlank()
            ))
            ->add('email', EmailType::class, array(
                'constraints' => new NotBlank()
            ))
            ->add('password', PasswordType::class, array(
               'constraints' => new NotBlank() 
            ))
            ->add('phone', TextType::class, array(
                'constraints' => new NotBlank()
            ))
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        // Check if it's a form submission and the data in it are valid.
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // Create the family first.
            $familyId = $this->createFamily($data);

            // Now create the user. And get back the created user.
            $user = $this->createUser($data, $familyId);

            // Now send the verification email.
            $this->sendVerificationMail($user);
        }


        return $this->render('users/register.html.twig', array(
            'form' => $form->createView()
        ));
    }

    // Creates a new unverified user.
    private function createUser($data, $familyId) {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setUsername($data['email']);
        $user->setPassword($data['password']);
        $user->setPhoneNumber($data['phone']);
        $user->setFamilyId($familyId);
        $user->setCreatedOn(new \DateTime("NOW"));
        $user->setCreatedBy(0);
        $user->setModifiedOn(new \DateTime("NOW"));
        $user->setModifiedBy(0);
        $em->persist($user);
        $em->flush();

        return $user; 
    }

    // Creates a new unverified family. 
    private function createFamily($data) {
        $em = $this->getDoctrine()->getManager();
        $family = new Family();
        $family->setFamilyName($data['family_name']);
        $family->setCreatedOn(new \DateTime("NOW"));
        $family->setCreatedBy(0);
        $family->setModifiedOn(new \DateTime("NOW"));
        $family->setModifiedBy(0);

        $em->persist($family);
        $em->flush();

        return $family->getFamilyId();
    }

    // This will send the verification email to the given users mail.
    private function sendVerificationMail($user) {
        $message = \Swift_Message::newInstance()
            ->setSubject("Lolololol")
            ->setFrom('kevintjayan@gmail.com')
            ->setTo('kevintjayan@gmail.com')
            ->setBody(
                $this->renderView('mails/activation.html.twig', array(
                    'name' => $user->getUsername(),
                    'link' => 'https://google.co.in/'
                )),
                'text/html'
            );
        $this->get('mailer')->send($message);

        return;
    }


}
