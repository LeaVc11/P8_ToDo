<?php

namespace App\Tests\Repository;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class UserRepositoryTest extends KernelTestCase
//KernelTestCase parce que j'ai besoin pour réupérer le repo
{
//testRemoveUser => OK
    public function testRemoveUser():void
    {
        //J'ai besoin de récupérer mon repo
        //Je démarre le Kernel qui va récupérer le noyau
        self::bootKernel();
        //Accèder aux container, pour les tests qui utilisent kernel tests, la possibilité d'accèder à un conteneur
        //dans ce contenueur de récupérer mon UserRepo
        //je lui demande de récupérer mon UserRpo, dc va me permettre de récup un repo qui est déjà tous configurés,
        $userRepository = new UserRepository(static::getContainer()->get(ManagerRegistry::class));ccccc
        //récupère un utilisateur par son nom d'utilisateur à l'aide de la findOneBy()méthode.
        // L'argument de cette méthode est un tableau avec une seule paire clé/valeur, 'username' => 'user'
        // ,qui spécifie la valeur du nom d'utilisateur à rechercher.
        // L'objet utilisateur renvoyé est stocké dans la $user.
        $user = $userRepository->findOneBy(['username' => 'user']);
        //Ce code vérifie si l'objet stocké dans $user est une instance de la User classe.
        //La assertInstanceOf()qui est une fonction qui prend deux arguments :
        //le nom de classe attendu et la variable à vérifier. Si $user n'est pas une instance de User, cette fonction lèvera une exception.
        $this->assertInstanceOf(User::class, $user);
        //Ce code supprime un utilisateur et le supprime définitivement de la base de données.
        // La remove()méthode est appelée sur l' $userRepository objet, en passant deux arguments :
        // l'utilisateur à supprimer, $user et une valeur booléenne true.
        //La valeur booléenne de true indique que l'utilisateur doit être définitivement supprimé de la base de données.
        $userRepository->remove($user, true);
        // Ce code vérifie si l'utilisateur a bien été supprimé de la base de données en le recherchant
        //à l'aide de la findOneBy()méthode et en vérifiant si le résultat est null.
        //La findOneBy()méthode est appelée sur l' $userRepository objet et prend un tableau avec une seule paire clé/valeur,
        //'username' => 'user', qui spécifie le nom d'utilisateur à rechercher.
        // Le résultat de cet appel de méthode est stocké dans la $user .
        // La assertNull()fonction est alors appelée, en passant $user en argument,
        // pour vérifier si elle est égale à null. Si le résultat de la recherche n'est pas null,
        //cela signifie que l'utilisateur n'a pas été supprimé et cette fonction lèvera une exception.
        $this->assertNull($userRepository->findOneBy(['username' => 'user']));

    }
}