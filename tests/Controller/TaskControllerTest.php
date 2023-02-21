<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function testListNotLoggedIn(): void
    {
        $client = static::createClient();
        $client->request('GET', '/tasks');

        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('login');
    }
    /**
     * @throws \Exception
     */
    public function testCreateTask(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user);
        $crawler = $client->request('GET', '/tasks/create');
        $this->assertInstanceOf(Form::class,
            $crawler->selectButton('Ajouter')->form());
        $client->submitForm('Ajouter', [
            'task[title]' => 'New Task title',
            'task[content]' => 'New task content',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('task_list');
        $this->assertSelectorExists('div.alert.alert-success');
    }
    public function testCreateNotLoggedIn(): void
    {
        $client = static::createClient();
        $client->request('GET', '/tasks/create');

        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('login');
    }

    /**
     * @throws \Exception
     */
    public function testEditTask()
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
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
    /**
     * @throws \Exception
     */
    public function testDeleteTask()
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user);
        $task = $user->getTasks()->first();
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
//        dump($user);
        $client->loginUser($user);
//        dump($user);
        $task = $user->getTasks()->first();
//        dump($task);
        $client->request('GET', '/tasks/'. $task->getId() .'/toggle');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('task_list');
        $this->assertSelectorExists('div.alert.alert-success');
    }

    /**
     * @throws \Exception
     */
    public function testAnonymousTaskDeleteAsAdmin(): void
    {
        $client = static::createClient();
        $task = static::getContainer()->get(TaskRepository::class)->findOneBy(['user' => null]);
//        dd($task);
        $admin = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
        $client->loginUser($admin);

        $client->request('GET', '/tasks/' . $task->getId() . '/delete');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('task_list');
        $this->assertSelectorExists('div.alert.alert-success');
    }


}