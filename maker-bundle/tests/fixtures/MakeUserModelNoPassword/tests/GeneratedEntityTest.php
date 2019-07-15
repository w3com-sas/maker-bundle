<?php

namespace App\Tests;

use Doctrine\ORM\EntityManager;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class GeneratedEntityTest extends WebTestCase
{
    public function testGeneratedEntity()
    {
        // login then access a protected page
        $client = static::createClient();
        $client->request('GET', '/login?username=hal9000');

        $this->assertSame(302, $client->getResponse()->getStatusCode());
        $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame('Homepage Success. Hello: hal9000', $client->getResponse()->getContent());
    }
}
