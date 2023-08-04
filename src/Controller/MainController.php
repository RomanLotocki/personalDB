<?php

namespace App\Controller;

use App\Repository\VideoGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    // Not in use. Embedded controller was not a good solution for my nav bar. I just needed to pass some variables but a controller creates a route. I didn't find the solution to use the active bootstrap class. Instead I create a component. That is why I was able to pass some datas to my nav bar template and also able to have the current route in my app
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
