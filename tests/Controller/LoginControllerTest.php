<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 16:01
 */

namespace App\Tests\Controller;

use App\Controller\LogInController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testLoginAction()
    {
        $client = self::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Enter')->form();

        $form['username'] = 'FeFe';
        $form['password'] = '1234';

        $crawler = $client->submit($form);

        $crawler = $client->followRedirect();

        self::assertGreaterThan(0, $crawler->filter('a:contains("Log out")')->count());

    }
}