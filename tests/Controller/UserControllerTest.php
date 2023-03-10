<?php

namespace App\Tests\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;


class UserControllerTest extends WebTestCase
{

    /**
     * @throws \Exception
     */
    public function testListOfUsersForAdmin(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
        $client->loginUser($user);
        $client->request('GET', '/users');
        $this->assertResponseIsSuccessful();
    }

    /**
     * @throws \Exception
     */
    public function testCreateUser(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user);
        $crawler = $client->request(Request::METHOD_GET, '/users/create');
        $this->assertInstanceOf(Form::class,
            $crawler->selectButton('Ajouter')->form());

        $client->submitForm('Ajouter', [
            'user[username]' => 'user2',
            'user[password][first]' => 'password',
            'user[password][second]' => 'password',
            'user[email]' => 'user@gmail.com',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('homepage');
    }

    /**
     * @throws \Exception
     */
    public function testEditUser()
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->request('GET', '/users/' . $user->getId() . '/edit');
        $this->assertRouteSame('user_edit');
        $this->assertRequestAttributeValueSame('id', $user->getId());
        $this->assertInputValueSame('user[username]', $user->getUsername());
        $this->assertInputValueSame('user[email]', $user->getEmail());
        $this->assertRouteSame('user_edit');
        $client->submitForm('Modifier', [
            'user[username]' => 'user4',
            'user[password][first]' => 'password',
            'user[password][second]' => 'password',
            'user[email]' => 'user@gmail.com',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('user_list');
    }

}