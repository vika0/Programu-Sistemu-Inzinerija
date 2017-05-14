<?php
// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use alkani\PSIBundle\Entity\Form\UserType;
use alkani\PSIBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class RegistrationController extends Controller
{

    /**
    * @Route("/registration", name="user_registration")
    */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->get('security.password_encoder')
            ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('default/home/home.html.twig');
        }

    return $this->render(
        'default/registration/register.html.twig',
        array('form' => $form->createView())
        );
    }
}