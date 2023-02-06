<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class SecurityControllerTest extends WebTestCase
{
    public function testLogin(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/login');
        $client->submitForm('Se connecter', [
            '_username' => 'admin',
            '_password' => 'admin',
        ]);
        $client->followRedirect();
        $this->assertRouteSame('homepage');
    }

}
