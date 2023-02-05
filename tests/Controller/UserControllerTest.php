<?php

namespace App\Tests\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;


class UserControllerTest extends WebTestCase
//WebTestCase => Permet d'écrire des tests avec des requêtes et les réponses
{

//    public function testListOfUsersForAdmin(): void
//    {
//        $client = static::createClient();
//        $client->request('GET', '/users');
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertRouteSame('login');
//    }

    /**
     * @throws \Exception
     */
    public function testCreateUser(): void
    {
// je crée une instance d'un client
        $client = static::createClient();
//récupère une instance de UserRepositoryà partir du conteneur de dépendances à l'aide de static::getContainer()->get(UserRepository::class)
//j'appelle la méthode findOneByUsername avec comme argument 'admin'.
//trouver un utilisateur avec le nom d'utilisateur "admin" dans la base de données et de le renvoyer.
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('admin');
        //dd($user);
//L'utilisateur avec le nom d'utilisateur "admin" est connecté à l'aide de la $client->loginUser($user)méthode.
        $client->loginUser($user);
//envoie une requête GET au point de terminaison "/users/create" en utilisant
// la méthode $client->request avec l'argument Request::METHOD_GETet "/users/create".
//La réponse est stockée dans la variable $crawler.
        //une page de création d'un nouvel utilisateur.
        $crawler = $client->request(Request::METHOD_GET, '/users/create');
        // dd($client->getResponse());
//vérifie d'abord si la réponse du serveur contient un formulaire en appelant $crawler->selectButton('Ajouter')->form()
        $this->assertInstanceOf(Form::class,
            $crawler->selectButton('Ajouter')->form());
        $client->submitForm('Ajouter', [
            'user[username]' => 'user1',
            'user[password][first]' => 'password',
            'user[password][second]' => 'password',
            'user[email]' => 'user@gmail.com',
            'user[roles]' => 'ROLE_USER',
//Le but de ce code est de soumettre un formulaire pour créer un nouvel utilisateur avec les valeurs spécifiées.
        ]);
//$this->assertResponseRedirects()est une méthode qui affirme que la réponse du serveur est une redirection (code d'état HTTP 302).
//Une réponse de redirection signifie que le client doit faire une autre demande à une URL différente afin de terminer l'action
        $this->assertResponseRedirects();
//$client->followRedirect()est une méthode du client de test qui suit une réponse de redirection du serveur.
//suivre la redirection est de récupérer le contenu de la page vers laquelle l'utilisateur
// a été redirigé après avoir soumis le formulaire,
        $client->followRedirect();
//$this->assertRouteSame('homepage')est une méthode qui affirme que la route actuelle est la même que celle spécifiée en argument.
//le but de cette assertion est de s'assurer qu'après avoir suivi la redirection,
// l'utilisateur a été redirigé avec succès vers la bonne page,
// qui est la page d'accueil de l'application Web.
        $this->assertRouteSame('login');
    }

    /**
     * @throws \Exception
     */
    public function testEditUser()
    {
        // je crée une instance d'un client
        $client = static::createClient();
        //je récupère une instance de la UserRepository classe à partir d'un conteneur de dépendances
        //J'appelle la méthode findOneByUsername
        //en passant l'argument 'user'
        //pour récupérer un utilisateur avec le nom d'utilisateur
        //"user" à partir de la base de données
        //L'objet utilisateur renvoyé sera affecté à la variable $user.
        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');

        //envoie une requête GET
        //avec une URL construite en concaténant la chaîne "/users/"
        //le résultat de l'appel de la méthode getId sur un l'objet $user et la chaîne "/edit".
        $client->request('GET', '/users/' . $user->getId() . '/edit');

        // je fais un test unitaire
        //J' utilise une  méthode assertpour vérifier que la route actuelle correspond à la valeur attendue.
        //La méthode assertRouteSame vérifie que la route actuelle est égale à l'argument de chaîne 'user_edit'.
        //Si la valeur réelle de la route actuelle ne correspond pas à la valeur attendue,
        //le test échouera.
        //cette assertion est de vérifier que le code testé (par exemple une action du contrôleur)
        // navigue vers la bonne route, dans ce cas "user_edit".
        $this->assertRouteSame('user_edit');
        //test fonctionnel
        $this->assertRequestAttributeValueSame('id', $user->getId());
//        $this->assertInputValueSame('user[username]', $user->getUsername());
//        $this->assertInputValueSame('user[email]', $user->getEmail());
//        $this->assertRouteSame('user_list');
//        $client->submitForm('Edit', [
//            'user[username]' => 'user1',
//            'user[password][first]' => 'password',
//            'user[password][second]' => 'password',
//            'user[email]' => 'user1@gmail.com',
//        ]);
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertResponseIsSuccessful();
//        $this->assertRouteSame('homepage');
//        $this->assertSelectorExists('div.alert.alert-success');
//    }

    }
}