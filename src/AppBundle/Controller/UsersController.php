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
// For guzzle http.
use GuzzleHttp\Client;

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
        $captchaError = "";

        // Get the recaptcha response. And validate it.
        $captchaResponse = $request->request->get('g-recaptcha-response');
        if($captchaResponse) {
            $captchaError = $this->validateCaptcha($captchaResponse);
            if($captchaError) 
                $captchaError = "Captcha validation failed.";
        }

        // Check if it's a form submission and the data in it are valid.
        if($form->isSubmitted() && $form->isValid() && !$captchaError) {
            // Get the data from the post.
            $data = $form->getData();

            // Get the repositories.
            $em = $this->getDoctrine()->getManager();
            $userRepo = $em->getRepository('AppBundle:User');
            $familyRepo = $em->getRepository('AppBundle:Family');

            // Create the family first.
            $familyId = $familyRepo->createTrialFamily($data);

            // Now create the user. And get back the created user.
            $user = $userRepo->createTrialUser($data, $familyId);

            // Now send the verification email.
            //$this->sendVerificationMail($user);
        }

        return $this->render('users/register.html.twig', array(
            'form' => $form->createView(),
            'captchaError' => $captchaError
        ));
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

    // Validates the captcha.
    private function validateCaptcha($captchaResponse) {
        $client = new Client([
            'base_uri' => 'https://www.google.com/recaptcha/api/siteverify',
            'timeout' => 2.0
        ]);
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', array(
            'form_params' => array(
                'secret' => '6LeN-CcTAAAAANqBk5nsARpfG82ndeagRCBQ6xhr',
                'response' => $captchaResponse
            )
        ));
       $jsonResponse = json_decode($response->getBody()->getContents());
       if($jsonResponse->success == true) return null;
       return false;
    }
}
