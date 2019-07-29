<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PartenaireControllerTest extends WebTestCase
{
    public function testAddPartenaire()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/ajoutpar',[],[],
        ['CONTENT_TYPE'=>"application/json"],
        '{"nomEntreprise": "SAGOLDi","ninea": "bm544","adresse": "guediawaye","raisonSocilale": "SARL","email": "gue@gmail.com","numeroCompte": 1234569,"utilisateur":2,"montantCompte": 500000 }');
        $rep=$client->getResponse();
            var_dump($rep);
     
       $this->assertSame(201,$client->getResponse()->getStatusCode());
    }
}
