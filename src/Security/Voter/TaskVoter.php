<?php

namespace App\Security\Voter;

use App\Entity\Task;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @codeCoverageIgnore
 */
class TaskVoter extends Voter
{
    public const DELETE = 'DELETE_TASK';
    private Security $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    protected function supports(string $attribute, mixed $subject): bool
    {
        return $attribute == self::DELETE
            && $subject instanceof Task;
    }
    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }
        if($attribute == self::DELETE){
            return $this->deleteTask($user, $subject);
        }
        return false;
    }
    private function deleteTask(UserInterface $user, mixed $subject): bool
    {
        if ($user == $subject->getUser()) {
            return true;
        }
        if ($this->security->isGranted("ROLE_ADMIN") && $subject->getUser() == null) {
            return true;
        }
        return false;
    }

}
