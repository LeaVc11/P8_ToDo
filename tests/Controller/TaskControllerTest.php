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
    public function testListAsAdmin(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
        $client->loginUser($user);
        $client->request('GET', '/tasks');

        $this->assertResponseIsSuccessful();
        $this->assertRouteSame('task_list');

    }
    /**
     * @throws \Exception
     */
    public function testListAsUser(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user);
        $client->request('GET', '/tasks');

        $this->assertResponseIsSuccessful();
        $this->assertRouteSame('task_list');

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
    public function testEditTaskNotLoggedIn(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $task = static::getContainer()->get(TaskRepository::class)->findOneBy(['user' => $user]);
        $client->request('GET', '/tasks/'. $task->getId() .'/edit');
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
    public function testEditTaskNotHolder(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user, 'admin');
        $task = static::getContainer()->get(TaskRepository::class)->findOneBy(['user' => $user]);
        $client->request('GET', '/tasks/'. $task->getId() .'/edit');

        $this->assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
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
    public function testTaskDeleteNotHolder(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user,'admin');
        $task = $user->getTasks()->first();
        $client->request(Request::METHOD_GET, '/tasks/'. $task->getId() .'/delete');

        $this->assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
    }

    /**
     * @throws \Exception
     */
    public function testTaskToggle(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user);
        $task = $user->getTasks()->first();
        $client->request('GET', '/tasks/'. $task->getId() .'/toggle');
        $this->assertResponseRedirects();
        $crawler = $client->followRedirect();
        $this->assertRouteSame('task_list');
        $this->assertSelectorExists('div.alert.alert-success');
    }

    /**
     * @throws \Exception
     */
    public function testTaskToggleNotHolder(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->loginUser($user,'admin');
        $task = $user->getTasks()->first();
        $client->request('GET', '/tasks/'. $task->getId() .'/toggle');

        $this->assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
    }

}