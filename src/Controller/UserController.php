<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route('/user/{id}', methods: ['GET', 'POST'], name: 'app_user', requirements: ['id' => '\d+'])]
    public function editUser(Request $request, User $user, EntityManagerInterface $manager): Response
    {
        $newPseudo = $request->get('pseudo');
        $newEmail = $request->get('email');
        $submittedToken = $request->request->get('token');

        if ($request->getMethod() === "POST" && $this->isCsrfTokenValid('modify-pseudo', $submittedToken)) {
            $user->setUserName($newPseudo);
            $user->setEmail($newEmail);
            $manager->flush();
        }

        return $this->render('user/edit_user.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user/mot-de-passe/{id}', methods: ['GET', 'POST'], name: 'app_user_password_edit', requirements: ['id' => '\d+'])]
    public function editPassword(Request $request, User $user, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager, ValidatorInterface $validator): Response
    {
        $oldPassword = $request->get('password-old');
        $newPassword = $request->get('password-new');
        $passwordConfirmation = $request->get('password-repeat');
        $submittedToken = $request->request->get('token');

        if ($request->getMethod() === "POST" && $this->isCsrfTokenValid('modify-password', $submittedToken)) {

            if ($hasher->isPasswordValid($user, $oldPassword) && $newPassword === $passwordConfirmation) {

                $user->setPassword($newPassword);

                $errors = $validator->validate($user);

                if (count($errors) > 0) {

                    foreach ($errors as $error) {
                        $this->addFlash(
                            'error',
                            $error->getMessage()
                        );
                    }
                } else {

                    $user->setPassword($hasher->hashPassword($user, $newPassword));
                    $manager->flush();

                    return $this->redirectToRoute('app_user', ["id" => $user->getId()]);
                }
            } else {

                $this->addFlash(
                    'error',
                    'Mot de passe incorrecte'
                );
            }
        }
        return $this->render('user/password_edit_user.html.twig', [
            'user' => $user,
            'controller_name' => 'UserController'
        ]);
    }
}
