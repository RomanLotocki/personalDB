<?php

namespace App\Controller;

use App\Entity\VideoGame;
use App\Form\VideoGameType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/home', methods: ['GET', 'POST'], name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $videoGame = new VideoGame();

        $form = $this->createForm(VideoGameType::class, $videoGame);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($videoGame);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('main/home.html.twig', [
            'form' => $form,
            'controller_name' => 'MainController',
        ]);
    }
}
