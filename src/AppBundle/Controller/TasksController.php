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
     * @Route("/tasks", name="tasks_list")
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
        $entityManager = $this->getDoctrine()->getManager();
        $projectRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\Project');
        $taskRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\Task');
        $userRepository = $entityManager->getRepository('alkani\PSIBundle\Entity\User');
        $task = $taskRepository->findOneBy(array('id' => $_GET['id'] ));
        $project = $projectRepository->findOneBy(array('id' => $_GET['id']));
        $users = $userRepository->findBy(array('id' => $_GET['id'] ));
        return $this->render('default/tasks/showTask.html.twig', array('project' => $project, 'tasks' => $task, 'users' => $users));

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

            return $this->redirectToRoute('tasks_list');

        }

        return $this->render(
            'default/tasks/createTask.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/deleteTask/{id}", name="delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('alkani\PSIBundle\Entity\Task')->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('tasks_list');
    }

    /**
     * @Route("/editTask/{id}", name="task_edit")
     */
    public function editAction(Request $request, Task $task)
    {
        $form = $this->createForm(TaskType::class, $task);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('tasks_list');

        }

        return $this->render('default/tasks/editTask.html.twig', [
            'task' => $task,
            'form' => $form->createView()
        ]);

    }
}