<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PartenaireControllerTest extends WebTestCase
{
    public function testAddPartenaireok()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/ajoutpar',[],[],
        ['CONTENT_TYPE'=>"application/json"],
        '{
            "nomEntreprise":"test1",
            "ninea":"E50test",
            "adresse":"test",
            "raisonSocilale":"SARL",
            "email":"test1@test1",
            "numeroCompte":1235452,
            "utilisateur":1,
            "montantCompte":50000,
            "statut":"débloqué"
        }');
        $rep=$client->getResponse();
            var_dump($rep);
       $this->assertSame(201,$client->getResponse()->getStatusCode());
    }
}
