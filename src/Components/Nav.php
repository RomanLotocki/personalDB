<?php

namespace App\Components;

use App\Repository\VideoGameRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[AsTwigComponent]
class Nav
{
    private VideoGameRepository $videoGameRepository;
    private $user;

    public function __construct(VideoGameRepository $videoGameRepository, TokenStorageInterface $tokenStorage)
    {
        $this->user = $tokenStorage->getToken()->getUser();
        $this->videoGameRepository = $videoGameRepository;
    }

    public function getConsoles(): array
    {
        $currentUser = $this->user;
        $consoles = $this->videoGameRepository->findConsolesInGames($currentUser);
        $consoles = (array_column($consoles, 'console'));
        $consoles = (array_values(array_unique($consoles)));
        
        // an example method that returns an array of Products
        return $consoles;

    }
}