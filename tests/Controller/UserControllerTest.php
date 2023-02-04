<?php

namespace App\Tests\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserControllerTest extends WebTestCase
//WebTestCase => Permet d'écrire des tests avec des requêtes et les réponses
{

//    public function testListOfUsersForAdmin(): void
//    {
//        $client = static::createClient();
//        $client->request('GET', '/users');
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertRouteSame('login');
//    }

    /**
     * @throws \Exception
     */
    public function testCreateUser():void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
        $client->loginUser($user);
        $client->request(Request::METHOD_GET, '/users/create');
        $client->submitForm('Ajouter', [
            'user[username]' => 'user1',
            'user[password][first]' => 'password',
            'user[password][second]' => 'password',
            'user[email]' => 'user@gmail.com',
            'user[roles]' => 'ROLE_USER',
        ]);

        $client->followRedirect();
        $this->assertResponseRedirects('/users', 302);
        $this->assertNotNull(UserRepository::class->findOneByUsername(['username' => 'user']));

    }


//    /**
//     * @throws \Exception
//     */
//    public function testEditUser()
//    {
//        $client = static::createClient();
//        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//        $client->request('GET', '/users/'. $user->getId() .'/edit');
//        $this->assertRouteSame('user_edit');
//        $this->assertRequestAttributeValueSame('id', $user->getId());
//        $this->assertInputValueSame('user[username]', $user->getUsername());
//        $this->assertInputValueSame('user[email]', $user->getEmail());
//        $this->assertRouteSame('user_list');
//        $client->submitForm('Edit', [
//            'user[username]' => 'user1',
//            'user[password][first]' => 'password',
//            'user[password][second]' => 'password',
//            'user[email]' => 'user1@gmail.com',
//        ]);
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertResponseIsSuccessful();
//        $this->assertRouteSame('homepage');
//        $this->assertSelectorExists('div.alert.alert-success');
//    }


}