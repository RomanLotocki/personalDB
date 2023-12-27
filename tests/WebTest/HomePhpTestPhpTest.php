<?php

namespace App\Tests\WebTest;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePhpTestPhpTest extends WebTestCase
{
    public function testLoginPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Bienvenue sur My Personnal DataBase');

        $button = $crawler->selectButton('Se connecter');
        $this->assertEquals(1, count($button));
    }

    public function testHomePageAccess(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/accueil');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $this->assertResponseRedirects('/', Response::HTTP_FOUND);
    }

    public function testAdminSectionAccess():  void
    {
        
        
        
        $client = static::createClient();
        

        $userRepository = static::getContainer()->get(UserRepository::class);
        $user = $userRepository->findOneBy(["email" => "user@gmail.com"]);
        $client->loginUser($user);
        $crawler = $client->request('GET', '/admin');
        $this->assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);

        $user = $userRepository->findOneBy(["email" => "admin@gmail.com"]);
        $client->loginUser($user);
        $crawler = $client->request('GET', '/admin');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        
    }
}
