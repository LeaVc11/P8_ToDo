<?php

namespace App\Tests\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;


class UserControllerTest extends WebTestCase
//WebTestCase => Permet d'écrire des tests avec des requêtes et les réponses
{

    /**
     * @throws \Exception
     */
//    public function testListOfUsersForAdmin(): void
//    {
//        $client = static::createClient();
//        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
////        dd($user);
//        $client->loginUser($user);
//        $client->request('GET', '/users');
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertRouteSame('user_list');
//    }

    /**
     * @throws \Exception
     */
    public function testCreateUser(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
//        dd($user);
        $client->loginUser($user);
        $crawler = $client->request(Request::METHOD_GET, '/users/create');
//         dd($client->getResponse());
//        echo $client->getResponse()->getContent();

        $this->assertInstanceOf(Form::class,
            $crawler->selectButton('Ajouter')->form());

        $client->submitForm('Ajouter', [
            'user[username]' => 'user2',
            'user[password][first]' => 'password',
            'user[password][second]' => 'password',
            'user[email]' => 'user2@gmail.com',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('user_list');
    }

    /**
     * @throws \Exception
     */
    public function testEditUser()
    {
        $client = static::createClient();
        $admin = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
        $client->loginUser($admin);
        $client->request('GET', '/users/' . $admin->getId() . '/edit');
        $this->assertRouteSame('user_edit');
        //test fonctionnel
        $this->assertRequestAttributeValueSame('id', $admin->getId());
        $this->assertInputValueSame('user[username]', $admin->getUsername());
        $this->assertInputValueSame('user[email]', $admin->getEmail());
        $this->assertRouteSame('user_list');
        $client->submitForm('Edit', [
            'user[username]' => 'user1',
            'user[password][first]' => 'password',
            'user[password][second]' => 'password',
            'user[email]' => 'user1@gmail.com',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertResponseIsSuccessful();
        $this->assertRouteSame('homepage');
        $this->assertSelectorExists('div.alert.alert-success');
    }

}