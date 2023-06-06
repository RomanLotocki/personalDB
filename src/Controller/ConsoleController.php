<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Console;
use App\Form\SearchType;
use App\Form\ConsoleType;
use App\Model\SearchData;
use App\Repository\ConsoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/console', name: 'app_console_')]
class ConsoleController extends AbstractController
{
    #[Route('/', methods: ['GET', 'POST'], name: 'list')]
    public function index(Request $request, EntityManagerInterface $em, ConsoleRepository $consoleRepository): Response
    {
        $console = new Console();

        $consoleForm = $this->createForm(ConsoleType::class, $console);

        $consoleForm->handleRequest($request);

        if ($consoleForm->isSubmitted() && $consoleForm->isValid()) {
            $console->setUser($this->getUser());
            $console->setCreatedAt(new DateTimeImmutable());
            $em->persist($console);
            $em->flush();

            return $this->redirectToRoute('app_console_list');
        }
        $searchData = new SearchData();
        $searchForm = $this->createForm(SearchType::class, $searchData);
        $searchForm->handleRequest($request);
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {

            $results = $consoleRepository->findAllConsolesByUserPaginated($this->getUser(), $searchData, $request->query->getInt('page', 1));

            return $this->render('main/consoles/consoles_list.html.twig', [
                'form' => $consoleForm,
                'search_form' => $searchForm,
                'consoles' => $results,
                'controller_name' => 'ConsoleController',
            ]);
        }

        return $this->render('main/consoles/consoles_list.html.twig', [
            'form' => $consoleForm,
            'search_form' => $searchForm,
            'consoles' => $consoleRepository->findAllConsolesByUserPaginated($this->getUser(), $searchData, $request->query->getInt('page', 1)),
            'controller_name' => 'ConsoleController',
        ]);
    }

    #[Route('/{id}/supprimer', methods: ['POST'], name: 'delete', requirements: ['id' => '\d+'])]
    public function delete(Request $request, Console $console, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $console->getId(), $request->request->get('_token'))) {
            $em->remove($console);
            $em->flush();
        }

        return $this->redirectToRoute('app_console_list', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/modifier', methods: ['GET', 'POST'], name: 'edit', requirements: ['id' => '\d+'])]
    public function edit(Request $request, Console $console, EntityManagerInterface $entityManager): Response
    {
        if ($console->getUser() !== $this->getUser()) {
            throw $this->createNotFoundException('Cette page n\'existe pas');
        } else {
            $form = $this->createForm(ConsoleType::class, $console);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $console->setUpdatedAt(new DateTimeImmutable());
                $entityManager->flush();

                return $this->redirectToRoute('app_console_list', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('main/consoles/console_edit.html.twig', [
                'console' => $console,
                'form' => $form,
                'controller_name' => 'ConsoleController'
            ]);
        }
    }

}