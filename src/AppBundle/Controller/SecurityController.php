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

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")

     */
    public function loginAction(Request $request)
    {

        $uid = $request->get('_username');
        $pwd = $request->get('_password');


        $entityManager = $this->getDoctrine()->getManager();
        $loginRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\User');
        $user = $loginRepository->findBy(
            array('email' => $uid, 'password' => $pwd));


        if ($user != null) {
            return $this->render('default/about/about.html.twig', array('user' =>$user));
        } else
            return $this->render('default/security/login.html.twig', array('error' =>"Bad email or password"));
    }
}
