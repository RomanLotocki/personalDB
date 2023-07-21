<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        xdebug_info();
        // exemple de comment récupérer la liste des jeux video depuis le user courant. Il faut itérer sur la collection d'objets Doctrine. La solution ne semble pas judicieuse. Elle implique une itération dans le code et met le meme temps (voir plus) qu'une fonction du repo qui fetcherait directement depuis la data base. Peut etre que si le nombres d'items en BDD devient très important cette solution sera mieux adaptée.
        // $user = $this->getUser();
        
        //     foreach ($user->getVideoGames() as $vg) {
        //         dump($vg);
        //     }
        
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
