<?php

namespace App\Controller;

use App\Repository\ConsoleRepository;
use App\Repository\VideoGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/accueil', name: 'app_home')]
    public function index(VideoGameRepository $videoGameRepository, ConsoleRepository $consoleRepository): Response
    {
        $currentUser = $this->getUser();
        $totalGames = count($videoGameRepository->findAllByUser($currentUser));
        $totalConsoles = count($consoleRepository->findAllByUser($currentUser));
        
        
        
        dump($totalGames);
        dump($totalConsoles);
        dump($videoGameRepository->findNineLastByUser($currentUser));

        return $this->render('main/home_page.html.twig', [
            'controller_name' => 'MainController',
            'videoGames' => $videoGameRepository->findNineLastByUser($currentUser)
        ]);
    }
}
