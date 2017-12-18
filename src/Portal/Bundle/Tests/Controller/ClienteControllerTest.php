<?php

namespace Portal\Bundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClienteControllerTest extends WebTestCase
{
    public function testListparameters()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/clientes');
    }

}
