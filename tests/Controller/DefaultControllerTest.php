<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;


class DefaultControllerTest extends WebTestCase
{
    public function testUserNotConnected()
    {

        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('login');
    }
    /**
     * @throws \Exception
     */
    public function testUserConnected(): void
    {
        $client = static::createClient();

        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//        dd($user);
        $client->loginUser($user);
        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $this->assertRouteSame('homepage');
    }

}