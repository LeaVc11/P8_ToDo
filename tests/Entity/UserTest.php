<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;

use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserEntity()
    {
        //crée une nouvelle instance de la classe User.
        // Il définit le nom d'utilisateur, l'e-mail, le mot de passe et les rôles de l'utilisateur
        // à l'aide des méthodes de définition fournies par la classe User.
        $user = new User;
        $user->setUsername('username')
            ->setEmail('user@gmail.com')
            ->setPassword('password')
            ->setRoles(['ROLE_USER'])
        ;
//la fonction assertEquals pour tester que les valeurs ont été définies correctement
// en utilisant les méthodes getter correspondantes.

        $this->assertEquals('username', $user->getUsername());
        $this->assertEquals('user@gmail.com', $user->getEmail());
        $this->assertEquals('password', $user->getPassword());
        $this->assertEquals(['ROLE_USER'], $user->getRoles());
    }
    public function testGetId(): void
    {
        //e code crée un nouvel Userobjet,
        // puis affirme que le résultat de l'appel getIdde l' $userobjet est null.
        //
        //Cette vérification signifie probablement que l' Userobjet n'a pas encore d'ID attribué
        // et que la getIdméthode doit revenir null
        //
        //test unitaire, testant le comportement de la User classe.
        // Le but du test est de s'assurer que la getIdméthode
        // retourne correctement null lorsque l' Userobjet n'a pas d'ID assigné.

        $user = new User();
        $this->assertNull($user->getId());
    }
    public function testGetUsername(): void
    {
        // crée une nouvelle instance de la classe User
        // je teste que la valeur renvoyée par la méthode getUsername() est nulle.
        // Il vérifie que la propriété username de l'objet User n'a pas été définie et renvoie donc null.
        $user = new User();
        $this->assertNull($user->getUsername());
    }
    public function testSetUsername(): void
    {
        //je crée une nouvelle instance de la classe User,

        // je teste que la valeur renvoyée par la méthode getUsername() est égale à la valeur attendue.
        // Il utilise la fonction assertSame,
        // pour tester que la valeur renvoyée par la méthode getUsername()
        // est la même que la valeur définie à l'aide de la méthode setUsername.
        $user = new User();

        // Je définit le nom d'utilisateur d'un objet utilisateur sur "test_username"
        //puis je vérifie si la valeur de la username propriété de l'objet utilisateur
        // est la même que la valeur attendue, "test_username", à l'aide de la assertSame qui est une méthode.

        $username = 'test_username';
        // d'abord le nom d'utilisateur de l' $user objet en appelant la setUsername méthode
        // et en passant la $username variable comme argument.
        // La valeur de la $username variable est "test_username".
          $user->setUsername($username);

        //  affirme que le résultat de l'appel getUsernamede l' $userobjet est le même que la valeur
        // de la $username variable.
        //
        //Cette comparaison est faite à l'aide de la assertSame méthode qui vérifie que les deux valeurs
        // sont la même instance du même type.
        //

        $this->assertSame($username, $user->getUsername());
        //test unitaire, testant le comportement de la User classe.
        // Le but du test est de s'assurer que la getUsername méthode
        // renvoie correctement le nom d'utilisateur qui a été défini sur l'User objet.
    }
    public function testGetUserIdentifier(): void
    {
        $user = new User();
        $username = 'test_username';
        $user->setUsername($username);
        $this->assertSame($username, $user->getUserIdentifier());
    }
    public function testGetRoles(): void
    {
        $user = new User();
        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testSetRoles(): void
    {
        $user = new User();
        $roles = ['ROLE_ADMIN', 'ROLE_USER'];
        $user->setRoles($roles);
        $this->assertSame($roles, $user->getRoles());
    }
    public function testGetPassword(): void
    {
        $user = new User();
        $this->assertNull($user->getPassword());
    }

    public function testSetPassword(): void
    {
        $user = new User();
        $password = 'test_password';
        $user->setPassword($password);
        $this->assertSame($password, $user->getPassword());
    }
    public function testEraseCredentials(): void
    {
        $user = new User();
        $user->eraseCredentials();
        $this->assertTrue(true);
    }

    public function testGetEmail(): void
    {
        $user = new User();
        $this->assertNull($user->getEmail());
    }

    public function testSetEmail(): void
    {
        $user = new User();
        $email = 'test@example.com';
        $user->setEmail($email);
        $this->assertSame($email, $user->getEmail());
    }

    public function testGetTasks(): void
    {
        //vérifie si $user est une instance de la Collection classe.

        //je crée d'abord une instance de la User classe en appelant le constructeur new User().
        $user = new User();
        // j'utilise la méthode assertInstanceOf
        // pour vérifier si le résultat de la getTasks méthode de $user est une instance de la Collectionclasse.
        // La assertInstanceOfméthode prend deux arguments,
        // le nom de classe attendu et la valeur réelle à tester.
        // Dans ce cas, la classe attendue est Collection::class,
        // et la valeur réelle est le résultat de $user->getTasks().
        $this->assertInstanceOf(Collection::class, $user->getTasks());
        //La assertInstanceOf méthode lèvera une erreur d'assertion si la valeur réelle n'est pas une instance de la classe attendue.
        // test unitaire est utilisé pour vérifier que la getTasks méthode de la User classe renvoie une instance de la Collectionclasse.
    }

    public function testAddTask(): void
    {
        //J'ai crée deux objets : $user et $task.
        // j'appelle ensuite la addTask méthode sur l' $user objet,en passant l' $task objet comme argument.
        //  Enfin, il affirme que le résultat de l'appel getTasks de l' $user objet contient l' $task objet.
        //
        //test unitaire, qui va tester le comportement de la User classe.
        // Le but du test est de s'assurer que lorsqu'une tâche est ajoutée à un utilisateur,
        // elle peut être récupérée via la getTasks méthode.
        $user = new User();
        $task = new Task();
        $user->addTask($task);
        $this->assertContains($task, $user->getTasks());
    }

    public function testRemoveTask(): void
    {
        $user = new User();
        $task = new Task();
        $user->addTask($task);
        $user->removeTask($task);
        $this->assertNotContains($task, $user->getTasks());
    }

    public function testToString(): void
    {
        //je crée un nouvel User objet
        // je définit son nom d'utilisateur pour 'test_username'utiliser la méthode setUsername.
        // Il convertit ensuite l'User objet en chaîne en l'enveloppant entre parenthèses et en appelant (string).

        //Enfin, il affirme que le résultat de la conversion de l'User objet en chaîne est égal à 'test_username'.
        // Userclasse a une méthode magique __toString implémentée, qui renvoie le nom d'utilisateur lorsque l' Usero bjet est converti en chaîne.

         //test unitaire, testant le comportement de la User classe.
        // Le but du test est de s'assurer que l'User objet peut être correctement converti en chaîne.

        $user = new User();
        $user->setUsername('test_username');
        $result = (string)$user;

        $this->assertEquals('test_username', $result);
    }

}
