<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 13:25
 */

namespace App\Tests;

use App\Entity\Songs;
use App\Controller\HomePageController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = self::createClient();

        $crawler = $client->request('GET','/');

        self::assertEquals(500,$client->getResponse()->getStatusCode());

    }

}