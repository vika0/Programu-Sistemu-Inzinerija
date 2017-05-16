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

class ClientController extends Controller
{
    /**
     * @Route("/client")
     */
    public function indexAction(Request $request)
    {

        return $this->render('default/client/client.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/clientlist")
     */
    public function listAction()
    {
        return $this->render('default/client/client.html.twig', array(
            'clients' => $this->getDoctrine()->getRepository('alkani\PSIBundle\Entity\Client')->findAll()
        ));
    }

}