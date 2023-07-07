<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    #[Route('/user/{id}', methods: ['GET', 'POST'], name: 'app_user', requirements: ['id' => '\d+'])]
    public function index(Request $request, User $user, EntityManagerInterface $manager): Response
    {
        $newPseudo = $request->get('pseudo');
        $submittedToken = $request->request->get('token');

        if ($request->getMethod() === "POST" && $this->isCsrfTokenValid('modify-pseudo', $submittedToken)) {
            $user->setUserName($newPseudo);
            $manager->flush();
        }

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
