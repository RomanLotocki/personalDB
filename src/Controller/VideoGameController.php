<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Form\SearchType;
use App\Entity\VideoGame;
use App\Model\SearchData;
use App\Form\VideoGameType;
use App\Repository\VideoGameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/jeux-video', name: 'app_vg_')]
class VideoGameController extends AbstractController
{
    #[Route('/', methods: ['GET', 'POST'], name: 'list')]
    public function index(Request $request, EntityManagerInterface $em, VideoGameRepository $videoGameRepository): Response
    {
        $videoGame = new VideoGame();

        $form = $this->createForm(VideoGameType::class, $videoGame);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $videoGame->setUser($this->getUser());
            $videoGame->setCreatedAt(new DateTimeImmutable());
            $em->persist($videoGame);
            $em->flush();

            return $this->redirectToRoute('app_vg_list');
        }
        $searchData = new SearchData();
        $searchForm = $this->createForm(SearchType::class, $searchData);
        $searchForm->handleRequest($request);
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {

            $results = $videoGameRepository->findAllByUserPaginated($this->getUser(), $searchData, $request->query->getInt('page', 1));

            return $this->render('main/video_games/video_games_list.html.twig', [
                'form' => $form,
                'search_form' => $searchForm,
                'videoGames' => $results,
                'controller_name' => 'VideoGameController',
            ]);
        }

        return $this->render('main/video_games/video_games_list.html.twig', [
            'form' => $form,
            'search_form' => $searchForm,
            'videoGames' => $videoGameRepository->findAllByUserPaginated($this->getUser(), $searchData, $request->query->getInt('page', 1)),
            'controller_name' => 'VideoGameController',
        ]);
    }

    #[Route('/{id}/supprimer', methods: ['POST'], name: 'delete', requirements: ['id' => '\d+'])]
    public function delete(Request $request, VideoGame $vg, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $vg->getId(), $request->request->get('_token'))) {
            $em->remove($vg);
            $em->flush();
        }

        return $this->redirectToRoute('app_vg_list', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/modifier', methods: ['GET', 'POST'], name: 'edit', requirements: ['id' => '\d+'])]
    public function edit(Request $request, VideoGame $vg, EntityManagerInterface $entityManager): Response
    {
        if ($vg->getUser() !== $this->getUser()) {
            throw $this->createNotFoundException('Cette page n\'existe pas');
        } else {
            $form = $this->createForm(VideoGameType::class, $vg);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $vg->setUpdatedAt(new DateTimeImmutable());
                $entityManager->flush();

                return $this->redirectToRoute('app_vg_list', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('main/video_games/video_game_edit.html.twig', [
                'vg' => $vg,
                'form' => $form,
                'controller_name' => 'VideoGameController'
            ]);
        }
    }

    #[Route('/{console}', methods: ['GET'], name: 'games_by_console')]
    public function gamesByConsole(VideoGameRepository $videoGameRepository, string $console): Response
    {
        $vg = $videoGameRepository->findByConsole($this->getUser(), ["console" => $console]);

        if (empty($vg)) {
            throw $this->createNotFoundException('Cette page n\'existe pas');
        }
        return $this->render('main/video_games/games_by_console.html.twig', [
            'vg' => $vg,
            'console' => $console,
            'controller_name' => 'VideoGameController'
        ]);
    }
}
