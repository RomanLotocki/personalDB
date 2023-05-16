<?php

namespace App\DataFixtures;

use App\Entity\VideoGame;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VideoGameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($x =0; $x <= 60; $x++) {
            $vg = new VideoGame();
            $vg->setName("Chrono Trigger");
            $vg->setDeveloper("SquareSoft");
            $vg->setPublisher("SquareSoft");
            $vg->setConsole("Super Famicom");
            $vg->setConservation("Très bon état. Complet");
            $vg->setCommentary("Jeu japonais. Acheté en 2020. Etat proche du neuf. Banger !!");
            $vg->setReleaseDate(new DateTimeImmutable('11/03/1995'));
        $manager->persist($vg);

        
        }
        $manager->flush();
    }
}
