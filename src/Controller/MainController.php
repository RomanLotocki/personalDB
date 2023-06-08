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
        $games = $videoGameRepository->findAllByUser($currentUser);
        $totalGames = count($games);
        $totalConsoles = count($consoleRepository->findAllByUser($currentUser));
        $olderGame = $videoGameRepository->findTheOlder($currentUser);

        //get the console with the most games
        $consoleList = [];
        foreach ($games as $game) {
            array_push($consoleList, $game->getConsole());
        }
        // first array_count_values gives an array where it counts each occurence of a value. If it counts playstation 10 times it will print playstation => 10 in the array. On that new array I apply the function max which will get the maximum value (eg 10 for playstation). I don't want the value 10 but the key (playstation) so I apply the function array_search which give the key associated to a value
        $consoleWithMostGames = array_search(max(array_count_values($consoleList)), array_count_values($consoleList));

        $consoleListOpti = (array_count_values($consoleList));
        
        return $this->render('main/home_page.html.twig', [
            'controller_name' => 'MainController',
            'videoGames' => $videoGameRepository->findNineLastByUser($currentUser),
            'totalGames' => $totalGames,
            'totalConsoles' => $totalConsoles,
            'olderGame' => $olderGame,
            'consoleWithMostGames' => $consoleWithMostGames,
            'consoleListOpti' => $consoleListOpti
        ]);
    }
}
