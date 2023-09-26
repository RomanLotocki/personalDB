<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateAdminService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserPasswordHasherInterface $hasher
    )
    {
        
    }

    public function create(string $email, string $userName, string $password) : void
    {
        $user = $this->userRepository->findOneBy(['email' => $email]);

        if(!$user) {
            $user = new User;
            $user->setEmail($email);
            $user->setUserName($userName);
            $user->setPassword($this->hasher->hashPassword($user, $password));
        }
            $user->setRoles(['ROLE_ADMIN']);
            $this->userRepository->save($user, true);

    }
}