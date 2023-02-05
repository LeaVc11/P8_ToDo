<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    //testListTask => ok
    public function testListTask(): void
    {
        $client = static::createClient();
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
        $client->request('GET', '/users');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('login');
    }

//testCreateTask
//    public function testCreateTask(): void
//    {
//
//    }
//testToggleTask
//testEditTask
//testDeleteTask


}