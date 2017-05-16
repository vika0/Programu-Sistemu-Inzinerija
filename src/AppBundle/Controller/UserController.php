<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.3.29
 * Time: 20.59
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    /**
     * @Route("/user")
     */
    public function indexAction(Request $request)
    {

        return $this->render('default/user/user.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/userEdit")
     */
    public function editAction()
    {
        return $this->render('default/user/userEdit.html.twig');
    }

    /**
     * @Route("/userEditPwd")
     */
    public function editPwdAction()
    {
        return $this->render('default/user/userPwd.html.twig', array('error' => null));
    }

    /**
     * @Route("/userPwd" , name="userPwd")
     */
    public function pwdAction(Request $request)
    {
        $session = $request->getSession();
        $uid = $request->get('_id');
        $oldPwd = $request->get('_oldPwd');
        $newPwd = $request->get('_newPwd');
        $newPwd2 = $request->get('_newPwd2');
        if ($newPwd != $newPwd2)
            return $this->render('default/user/userPwd.html.twig', array('error' => "Slaptažodžiai nesutampa"));


        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('alkani\PSIBundle\Entity\User')->find($uid);

        $encoder = $this->get('security.password_encoder');

        $match = $encoder->isPasswordValid($user, $oldPwd);

        if ($match) {
            // Updates the user table
            $password = $encoder->encodePassword($user, $newPwd);
            $user->setPassword($password);
            $em->flush();

            $session = $request->getSession('user');

            if ($user != null) {
                $session->set('user', $user);
            }

            return $this->render('default/user/user.html.twig');
        }
            else{
                return $this->render('default/user/userPwd.html.twig', array('error' => "Jus neteisingai įvedete sena slaptažodį"));
        }


    }

    /**
     * @Route("/userSave", name="userSave")
     */
    public function saveAction(Request $request)
    {
        $uid = $request->get('_id');
        $name = $request->get('_name');
        $surname = $request->get('_surname');
        $phone = $request->get('_phone');
        $email = $request->get('_email');



        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('alkani\PSIBundle\Entity\User')->find($uid);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id ' . $uid
            );
        }

        // Updates the user table
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPhone($phone);
        $user->setEmail($email);
        $em->flush();

        $session = $request->getSession('user');



        if ($user != null) {
            $session->set('user', $user);
        }

        return $this->render('default/user/user.html.twig');
    }


    /**
     * @Route("/usersList")
     */
    public function listAction()
    {
        return $this->render('default/users/users.html.twig', array(
            'users' => $this->getDoctrine()->getRepository('alkani\PSIBundle\Entity\User')->findAll()
        ));
    }



    /**
     * @Route("/users/show")
     */
    public function showAction()
    {
        return $this->render('default/tasks/showTask.html.twig', array(
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}