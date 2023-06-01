<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use App\Entity\VideoGame;
use App\DataFixtures\UserFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class VideoGameFixtures extends Fixture implements DependentFixtureInterface
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
            $vg->setCountry("Japon");
            $vg->setImageName("chrono-trigger-super-famicom-2-6475205b09465509180039.jpg");
            $vg->setConservation("Très bon état. Complet");
            $vg->setCommentary("Jeu japonais. Acheté en 2020. Etat proche du neuf. Banger !!");
            $vg->setReleaseDate(new DateTimeImmutable('11/03/1995'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Street Fighter II Turbo : Hyper Fighting");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Super Nintendo");
            $vg->setCountry("Europe");
            $vg->setImageName("sf2tsn0f.jpg");
            $vg->setConservation("Cartouche seule");
            $vg->setReleaseDate(new DateTimeImmutable('08/01/1993'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Donkey Kong Country");
            $vg->setDeveloper("Rare");
            $vg->setPublisher("Nintendo");
            $vg->setConsole("Super Nintendo");
            $vg->setCountry("Europe");
            $vg->setImageName("Donkey_Kong_Country_SNES_cover.png");
            $vg->setConservation("Complet. Etat moyen. Boîte abimée");
            $vg->setReleaseDate(new DateTimeImmutable('11/21/1994'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("The Legend Of Zelda : Majora's Mask");
            $vg->setDeveloper("Nintendo");
            $vg->setPublisher("Nintendo");
            $vg->setConsole("Nintendo 64");
            $vg->setCountry("Europe");
            $vg->setImageName("majoras_mask_cover.jpg");
            $vg->setConservation("Complet. Boîte abimée sur l'arrière");
            $vg->setReleaseDate(new DateTimeImmutable('11/17/2000'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("The Legend Of Zelda : Ocarina Of Time");
            $vg->setDeveloper("Nintendo");
            $vg->setPublisher("Nintendo");
            $vg->setConsole("Nintendo 64");
            $vg->setCountry("Europe");
            $vg->setImageName("the-legend-of-zelda-ocarina-of-time-1-647524ce0518f389632325.jpg");
            $vg->setConservation("Cartouche seule. Bon état");
            $vg->setReleaseDate(new DateTimeImmutable('12/11/1998'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Final Fantasy VIII");
            $vg->setDeveloper("Squaresoft");
            $vg->setPublisher("SCEE");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("ff8_cover.jpg");
            $vg->setReleaseDate(new DateTimeImmutable('10/27/1999'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Resident Evil 3 Nemesis");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("resident_evil_3_cover.jpg");
            $vg->setReleaseDate(new DateTimeImmutable('02/18/2000'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Resident Evil");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("resident_evil_cover.jpg");
            $vg->setReleaseDate(new DateTimeImmutable('08/01/1996'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Tomb Raider 2");
            $vg->setDeveloper("Core Design");
            $vg->setPublisher("Eidos Interactive");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("tr2-1-64751232197ea171224476.jpg");
            $vg->setReleaseDate(new DateTimeImmutable('12/01/1997'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Resident Evil 2");
            $vg->setDeveloper("Capcom");
            $vg->setPublisher("Capcom");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("re2-1-647523f80f2bd980590941.jpg");
            $vg->setReleaseDate(new DateTimeImmutable('04/15/1998'));
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Medievil");
            $vg->setDeveloper("SCE Studio Cambridge");
            $vg->setPublisher("SCEE");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("medievil-1-6475233b42dfe907102988.jpeg");
            $vg->setReleaseDate(new DateTimeImmutable('10/09/1998'));
            $vg->setConservation("Très bon état");
            $vg->setCommentary("Version Platinium");
            $vg->setAcquisitionDate(new DateTimeImmutable('05/20/2023'));
            $vg->setAcquisitionPrice("39,90 €");
            $vg->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Suikoden II");
            $vg->setDeveloper("Konami");
            $vg->setPublisher("Konami");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("suikoden2_cover.jpg");
            $vg->setReleaseDate(new DateTimeImmutable('07/28/2000'));
            $vg->setUser($userRepo->findOneBy(['email' => 'user@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $vg = new VideoGame();
            $vg->setName("Metal Gear Solid");
            $vg->setDeveloper("Konami");
            $vg->setPublisher("Konami");
            $vg->setConsole("Playstation");
            $vg->setCountry("Europe");
            $vg->setImageName("metal-gear-solid-ps-pal-1-64751716e38f9033069502.jpg");
            $vg->setReleaseDate(new DateTimeImmutable('02/26/1999'));
            $vg->setCommentary("Très bon état");
            $vg->setUser($userRepo->findOneBy(['email' => 'user@gmail.com']));
            $vg->setCreatedAt(new DateTimeImmutable());
        $manager->persist($vg);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
