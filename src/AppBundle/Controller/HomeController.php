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

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {



        return $this->render('default/home/home.html.twig', [

        ]);
    }
}