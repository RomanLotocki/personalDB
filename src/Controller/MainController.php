<?php

namespace App\Controller;

use App\Repository\VideoGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    public function navController(VideoGameRepository $videoGameRepository): Response
    {
        $currentUser = $this->getUser();
        $consoles = $videoGameRepository->findConsolesInGames($currentUser);
        $consoles = (array_column($consoles, 'console'));
        $consoles = (array_values(array_unique($consoles)));

        return $this->render('partials/nav.html.twig', [
            'consoles' => $consoles,
            'controller_name' => "MainController"
        ]);
    }
}
