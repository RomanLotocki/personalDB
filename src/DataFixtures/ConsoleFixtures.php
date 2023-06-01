<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Console;
use App\DataFixtures\UserFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ConsoleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $userRepo = $manager->getRepository(User::class);
        
        $c = new Console();

        $c->setName("PlayStation");
        $c->setManufacturer("Sony Computer Entertainment");
        $c->setReleaseDate(new DateTimeImmutable('09/29/1995'));
        $c->setCountry("France");
        $c->setAccessories("1 manette originale fonctionnelle et 2 cartes mémoire");
        $c->setConservationAndCommentaries("Ma console originale achetée en octobre ou novembre 1997");
        $c->setUser($userRepo->findOneBy(['email' => 'admin@gmail.com']));
        
        $manager->persist($c);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
