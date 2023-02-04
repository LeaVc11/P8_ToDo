<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class DefaultControllerTest extends WebTestCase
{
    //testIndexNotConnected => OK
    public function testIndexNotConnected()
    {
        // crée un nouvel objet client avec la méthode createClient
        //static = mot clé spécifie que la méthode est appelée sur la classe, plutôt que sur une instance de la classe
        //Le but de l'objet client est de faire des demandes à l'application et de récupérer les réponses,
        // dans le cadre des tests fonctionnels.
        $client = static::createClient();
        // Je fait une requête GET au répertoire racine "/".
        // L'objet "$client" est une instance d'une bibliothèque client HTTP telle que Guzzle,
        // et la méthode "request" est appelée dessus avec deux arguments :
        // la méthode HTTP ("GET") et le point de terminaison de l'URL ("/" ).
        $client->request('GET', '/');
        //un test unitaire . La méthode "assertResponseRedirects" affirme que la réponse actuelle est une réponse de redirection,
        // qui aurait un code d'état de 3xx.
        // Le "$this" fait référence à l'objet de cas de test actuel,
        $this->assertResponseRedirects();//est ce que je redirige
        //La méthode "followRedirect" est utilisée en PHP pour suivre automatiquement une réponse de redirection
        // d'une requête HTTP
        $client->followRedirect();// suivre la redirection
        // assertRouteSame méthode pour vérifier que la route actuelle correspond à la valeur attendue de "login".
        //s'assurer que l'application navigue vers la bonne page ou URL.
        $this->assertRouteSame('login');// je vérifie si je suit  sur la route login
    }

    /**
     * @throws \Exception
     */
    //testIndexConnected => OK
    public function testIndexConnected(): void
    {
        $client = static::createClient();

        $user = static::getContainer()->get(UserRepository::class)->findOneByUsername('user');
//        dd($user);
        $client->loginUser($user);
        $client->request(Request::METHOD_GET, '/');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertRouteSame('login');
    }

}