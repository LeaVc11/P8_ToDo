<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;

class TaskControllerTest extends WebTestCase
{
    /**
     * @throws \Exception
     */
    public function testListTask(): void
    {
        $client = static::createClient();
        $client->request('GET', '/tasks');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('login');
    }

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
        $this->assertInstanceOf(Form::class,
            $crawler->selectButton('Ajouter')->form());
        $client->submitForm('Ajouter', [
            'task[title]' => 'New Task title',
            'task[content]' => 'New task content',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('task_list');
    }
//testToggleTask
    /**
     * @throws \Exception
     */
    public function testEditTask()
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//    dd($user);
        $client->loginUser($user);
        $task = $user->getTasks()->first();
        $client->request('GET', '/tasks/' . $task->getId() . '/edit');
        $this->assertRouteSame('task_edit');
        $this->assertRequestAttributeValueSame('id', $task->getId());
        $this->assertInputValueSame('task[title]', $task->getTitle());
        $this->assertSelectorTextSame('textarea[name="task[content]"]', $task->getContent());
        $this->assertRouteSame('task_edit');
        $client->submitForm('Modifier', [
            'task[title]' => 'essai 8',
            'task[content]' => 'essai 8',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('task_list');
        $this->assertSelectorExists('div.alert.alert-success');
    }
//testDeleteTask

    /**
     * @throws \Exception
     */
    public function testDeleteTask()
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//        dd($user);
        $client->loginUser($user);
        $task = $user->getTasks()->first();
//        dd($task);
        $client->request('GET', '/tasks/' . $task->getId() . '/delete');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('task_list');
        $this->assertSelectorExists('div.alert.alert-success');
    }

    /**
     * @throws \Exception
     */
    public function testTaskToggle(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//        dd($user);
        $client->loginUser($user);
        $task = $user->getTasks()->first();
        $client->request(Request::METHOD_GET, '/tasks/'. $task->getId() .'/toggle');
        $this->assertResponseRedirects();
        $crawler = $client->followRedirect();
        $this->assertRouteSame('task_list');
        $this->assertSelectorExists('div.alert.alert-success');
    }

}