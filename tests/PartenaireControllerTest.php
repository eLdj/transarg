<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PartenaireControllerTest extends WebTestCase
{
    public function testAddPartenaireok()
    {
         $client = static::createClient([],[
            'PHP_AUTH_USER'=> 'sudo' ,
             'PHP_AUTH_PW'=>'pass'
          ]);
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
            "statut":"bloqué"
        }');
        $rep=$client->getResponse();
            var_dump($rep);
       $this->assertSame(201,$client->getResponse()->getStatusCode());
    }

    // public function testAdduser()
    // {
    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=> 'sudo' ,
    //         'PHP_AUTH_PW'=>'pass'
    //     ]);

    //     $crawler = $client->request('POST', 'api/authentification',[],[],
    //     ['CONTENT_TYPE'=>"application/json"],
    //     '{
    //         "username": "aminatatatata",
    //         "password": "pass",
    //         "nom": "amina",
    //         "prenom": "test",
    //         "email": "test@test",
    //         "profil": 1,
    //         "partenaire": 1,
    //         "cin": 123456,
    //         "statut": 2
    //     }');
    //     $rep=$client->getResponse();
    //         var_dump($rep);
    //    $this->assertSame(201,$client->getResponse()->getStatusCode());
    // }
}


