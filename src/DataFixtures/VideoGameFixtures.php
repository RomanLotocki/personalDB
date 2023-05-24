<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use App\Entity\VideoGame;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VideoGameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // for ($x =0; $x <= 60; $x++) {
        //     $vg = new VideoGame();
        //     $vg->setName("Chrono Trigger");
        //     $vg->setDeveloper("SquareSoft");
        //     $vg->setPublisher("SquareSoft");
        //     $vg->setConsole("Super Famicom");
        //     $vg->setConservation("Très bon état. Complet");
        //     $vg->setCommentary("Jeu japonais. Acheté en 2020. Etat proche du neuf. Banger !!");
        //     $vg->setReleaseDate(new DateTimeImmutable('11/03/1995'));
        // $manager->persist($vg);
        // }
        $userRepo = $manager->getRepository(User::class);
        $vg = new VideoGame();
            $vg->setName("Chrono Trigger");
            $vg->setDeveloper("SquareSoft");
            $vg->setPublisher("SquareSoft");
            $vg->setConsole("Super Famicom");
            $vg->setConservation("Très bon état. Complet");
            $vg->setCommentary("Jeu japonais. Acheté en 2020. Etat proche du neuf. Banger !!");
            $vg->setReleaseDate(new DateTimeImmutable('11/03/1995'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Street Fighter II Turbo : Hyper Fighting");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Super Nintendo");
            $vg->setConservation("Cartouche seule");
            $vg->setReleaseDate(new DateTimeImmutable('08/01/1993'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Donkey Kong Country");
            $vg->setDeveloper("Rare");
            $vg->setPublisher("Nintendo");
            $vg->setConsole("Super Nintendo");
            $vg->setConservation("Complet. Etat moyen. Boîte abimée");
            $vg->setReleaseDate(new DateTimeImmutable('11/21/1994'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("The Legend Of Zelda : Majora's Mask");
            $vg->setDeveloper("Nintendo");
            $vg->setPublisher("Nintendo");
            $vg->setConsole("Nintendo 64");
            $vg->setConservation("Complet. Boîte abimée sur l'arrière");
            $vg->setReleaseDate(new DateTimeImmutable('11/17/2000'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("The Legend Of Zelda : Ocarina Of Time");
            $vg->setDeveloper("Nintendo");
            $vg->setPublisher("Nintendo");
            $vg->setConsole("Nintendo 64");
            $vg->setConservation("Cartouche seule. Bon état");
            $vg->setReleaseDate(new DateTimeImmutable('12/11/1998'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Final Fantasy VIII");
            $vg->setDeveloper("Squaresoft");
            $vg->setPublisher("SCEE");
            $vg->setConsole("Playstation");
            $vg->setReleaseDate(new DateTimeImmutable('10/27/1999'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Resident Evil 3 Nemesis");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Playstation");
            $vg->setReleaseDate(new DateTimeImmutable('02/18/2000'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Resident Evil");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Playstation");
            $vg->setReleaseDate(new DateTimeImmutable('08/01/1996'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Tomb Raider 2");
            $vg->setDeveloper("Core Design");
            $vg->setPublisher("Eidos Interactive");
            $vg->setConsole("Playstation");
            $vg->setReleaseDate(new DateTimeImmutable('12/01/1997'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Resident Evil 2");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Playstation");
            $vg->setReleaseDate(new DateTimeImmutable('04/15/1998'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Medievil");
            $vg->setDeveloper("SCE Studio Cambridge");
            $vg->setPublisher("SCEE");
            $vg->setConsole("Playstation");
            $vg->setReleaseDate(new DateTimeImmutable('10/09/1998'));
            $vg->setConservation("Très bon état");
            $vg->setCommentary("Version Platinium");
            $vg->setAcquisitionDate(new DateTimeImmutable('05/20/2023'));
            $vg->setAcquisitionPrice("39,90 €");
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Suikoden II");
            $vg->setDeveloper("Konami");
            $vg->setPublisher("Konami");
            $vg->setConsole("Playstation");
            $vg->setReleaseDate(new DateTimeImmutable('07/28/2000'));
            $vg->setUser($userRepo->findOneBy(['email' => 'user@gmail.com']));
        $manager->persist($vg);

        $manager->flush();
    }
}
