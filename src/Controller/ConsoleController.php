<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/console', name: 'app_console_')]
class ConsoleController extends AbstractController
{
    #[Route('/', methods: ['GET', 'POST'], name: 'list')]
    public function index(): Response
    {
        return $this->render('main/console/console_list.html.twig', [
            'controller_name' => 'ConsoleController',
        ]);
    }
}
