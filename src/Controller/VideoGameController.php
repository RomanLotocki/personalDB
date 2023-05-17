<?php

namespace App\Controller;

use App\Entity\VideoGame;
use App\Form\VideoGameType;
use App\Repository\VideoGameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VideoGameController extends AbstractController
{
    #[Route('/data-base/jeux-video', methods: ['GET', 'POST'], name: 'app_vg_list')]
    public function index(Request $request, EntityManagerInterface $em, VideoGameRepository $videoGameRepository): Response
    {
        $videoGame = new VideoGame();

        $form = $this->createForm(VideoGameType::class, $videoGame);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($videoGame);
            $em->flush();

            return $this->redirectToRoute('app_vg_list');
        }
        
        return $this->render('main/video_games_list.html.twig', [
            'form' => $form,
            'videoGames' => $videoGameRepository->findAll(),
            'controller_name' => 'VideoGameController',
        ]);
    }

    #[Route('/{id}', methods: ['POST'], name: 'app_vg_delete', requirements: ['id' => '\d+'])]
    public function delete(Request $request, VideoGame $vg, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vg->getId(), $request->request->get('_token'))) {
            $em->remove($vg);
            $em->flush();
        }

        return $this->redirectToRoute('app_vg_list', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/modifier', methods: ['GET', 'POST'], name: 'app_vg_edit', requirements: ['id' => '\d+'])]
    public function edit(Request $request, VideoGame $vg, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VideoGameType::class, $vg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_vg_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('main/video_game_edit.html.twig', [
            'vg' => $vg,
            'form' => $form,
            'controller' => 'VideoGameController'
        ]);
    }
}
