<?php
/**
 * Created by PhpStorm.
 * User: Simonas-LenovoLP
 * Date: 2017-04-23
 * Time: 1:57 AM
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use alkani\PSIBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")

     */
    public function loginAction(Request $request)
    {

        $session = $request->getSession();
        $uid = $request->get('_username');
        $pwd = $request->get('_password');



        $entityManager = $this->getDoctrine()->getManager();
        $loginRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\User');
        $user = $loginRepository->findOneBy(array('email' => $uid));

        $encoder = $this->get('security.password_encoder');
        $password = $this->get('security.password_encoder')
            ->encodePassword($user, $pwd);

        $match = $encoder->isPasswordValid($user, $pwd);
        if ($match) {
            $session->set('user', $user);
            $session->set('username', $user->getName());
            return $this->render('default/about/about.html.twig', array('user' =>$user));
        } else
            return $this->render('default/security/login.html.twig', array('error' =>"Bad email or password"));
    }
}
