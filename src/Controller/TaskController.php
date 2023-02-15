<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager,)
    {

    }

    #[Route('/tasks', name: 'task_list', methods: ['GET'])]
    public function list(TaskRepository $taskRepository): Response
    {

        $tasks = $taskRepository->findBy(['isDone' => false]);
        dump($tasks);

//        dd($tasks);
        return $this->render('task/list.html.twig', [
            'tasks' => $tasks
        ]);
    }
    #[Route('/tasks/end', name: 'task_list_end', methods: ['GET'])]
    public function listEnd(TaskRepository $taskRepository): Response
    {

        $tasks = $taskRepository->findBy(['isDone' => true]);
        dump($tasks);

//        dd($tasks);
        return $this->render('task/list.html.twig', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    #[Route('/tasks/create', name: 'task_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task->setUser($this->getUser());
            $task = $form->getData();
            $this->entityManager->persist($task);
            $this->entityManager->flush();

            $this->addFlash('success', sprintf('La tâche %s a été bien été ajoutée.', $task->getTitle()));

            return $this->redirectToRoute('task_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('task/create.html.twig', [
                'form' => $form->createView()]
        );
    }


    #[Route('/tasks/{id}/edit', name: 'task_edit', methods: ['GET', 'POST'])]
    public function edit(Task $task, Request $request): Response
    {
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $this->entityManager->persist($task);
            $this->entityManager->flush();
            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('task/edit.html.twig', [
                'form' => $form->createView(),
                'task' => $task,
            ]
        );
    }

    #[Route('/tasks/{id}/toggle', name: 'task_toggle')]
    public function toggleTask(Task $task): Response
    {
        $task->toggle(!$task->isDone());
        $this->entityManager->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    #[Route('/tasks/{id}/delete', name: 'task_delete')]
    public function deleteTask(Task $task, TaskRepository $taskRepository): Response
    {
        $this->denyAccessUnlessGranted('DELETE_TASK', $task,
            'vous n\'avez pas accès à la suppression de cette tâche');
        if ($task->getUser() !== null) {
            $this->getUser()->removeTask($task);
        }
        $taskRepository->remove($task);
        $this->addFlash('success', 'La tâche a bien été supprimée.');
        return $this->redirectToRoute('task_list', [], Response::HTTP_SEE_OTHER);
    }
}