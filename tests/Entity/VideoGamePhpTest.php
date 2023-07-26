<?php

namespace App\Tests\Entity;

use App\Entity\VideoGame;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class VideoGameTestPhpTest extends KernelTestCase
{
    public function testSomething(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $vg = new VideoGame();
        $vg->setName('Wild Arms')
            ->setConsole('PlayStation')
            ->setReleaseDate(new DateTimeImmutable('10/01/1998'))
            ->setCountry('Europe')
            ->setCreatedAt(new DateTimeImmutable());

        $errors = $container->get('validator')->validate($vg);
        $this->assertCount(0, $errors);

        dump($vg->getName());

        $this->assertTrue($vg->getName() == 'Wild Arms');
        $this->assertSame('PlayStation', $vg->getConsole());
        $this->assertSame($vg->getName(), $vg->__toString());

    }


}
