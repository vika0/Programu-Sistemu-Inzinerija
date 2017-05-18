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

class ProjectsController extends Controller
{
    /**
     * @Route("/projects")
     */
    public function indexAction(Request $request)
    {


        return $this->render('default/projects/projects.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/projects/list")
     */
    public function listAction()
    {
        return $this->render('default/projects/projects.html.twig', array(
            'projects' => $this->getDoctrine()->getRepository('alkani\PSIBundle\Entity\Project')->findAll()
        ));
    }

    /**
     * @Route("/projectsShow", name="projectsShow")
     */
    public function showAction()
    {
//        return $this->render('default/projects/showProject.html.twig');
//

        $entityManager = $this->getDoctrine()->getManager();
        $projectRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\Project');
        $taskRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\Task');
        $userRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\User');
        $project = $projectRepository->findOneBy(array('id' => $_POST['id']));
        $tasks = $taskRepository->findBy(array('fkProjectid' => $_POST['id'] ));
        $users = $userRepository->findBy(array('id' => $_POST['id'] ));
        return $this->render('default/projects/showProject.html.twig', array('project' => $project, 'tasks' => $tasks, 'users' => $users));

//        return $this->render('default/client/client.html.twig', array(
//            'clients' => $this->getDoctrine()->getRepository('alkani\PSIBundle\Entity\Client')->findAll()
//        ));
    }
}