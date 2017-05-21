<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.3.29
 * Time: 20.59
 */
namespace AppBundle\Controller;


use alkani\PSIBundle\Entity\Form\TaskType;
use alkani\PSIBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TasksController extends Controller
{
//    /**
//     * @Route("/tasks")
//     */
//    public function indexAction(Request $request)
//    {
//
//        return $this->render('default/tasks/tasks.html.twig', [
////            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
//        ]);
//    }
    /**
     * @Route("/tasks")
     */
    public function listAction()
    {
        return $this->render('default/tasks/tasks.html.twig', array(
            'tasks' => $this->getDoctrine()->getRepository('alkani\PSIBundle\Entity\Task')->findAll()
        ));
    }
    /**
     * @Route("/tasks/show")
     */
    public function showAction()
    {
        return $this->render('default/tasks/showTask.html.twig', array(
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route("/createTask", name="task_creation")
     */
    public function createAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->render('default/tasks/tasks.html.twig', array(
                'tasks' => $this->getDoctrine()->getRepository('alkani\PSIBundle\Entity\Task')->findAll()
            ));
        }

        return $this->render(
            'default/tasks/createTask.html.twig',
            array('form' => $form->createView())
        );
    }
}