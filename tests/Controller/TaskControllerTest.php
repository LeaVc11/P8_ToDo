<?php

namespace App\Tests\Controller;

use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;

class TaskControllerTest extends WebTestCase
{
    //testListTask => ok
//    public function testListTask(): void
//    {
//        $client = static::createClient();
//        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//        $client->request('GET', '/users');
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertRouteSame('login');
//    }

//testCreateTask
    /**
     * @throws \Exception
     */
    public function testCreateTask(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//        dd($user);
        $client->loginUser($user);
        $crawler = $client->request(Request::METHOD_GET, '/tasks/create');
//         dd($client->getResponse());
//        echo $client->getResponse()->getContent();

        $this->assertInstanceOf(Form::class,
            $crawler->selectButton('Ajouter')->form());

        $client->submitForm('Ajouter', [
            'task[title]' => 'Task title',
            'task[content]' => 'My task content',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('task_list');
    }
//testToggleTask
//testEditTask
//testDeleteTask


}