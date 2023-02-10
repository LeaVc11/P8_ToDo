<?php

namespace App\Tests\Security;

use App\Entity\Task;
use App\Security\Voter\TaskVoter;
use Monolog\Test\TestCase;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

class TaskVoterTest extends TestCase
{
    public function testNoUser(): void
    {
        $token = $this->createMock(TokenInterface::class);
        $token->expects($this->once())
            ->method('getUser')
            ->willReturn(null);

        $voter = new TaskVoter();
        $this->assertEquals(VoterInterface::ACCESS_DENIED, $voter->vote($token, new Task, [TaskVoter::DELETE]));
    }
}