<?php

namespace bookStoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class getControllerTest extends WebTestCase
{
    public function testGetjson()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getJson');
    }

}
