<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 20:28
 */

namespace App\Tests\Forms;

use App\Forms\UserType;
use App\Entity\User;
use Symfony\Component\Form\Test\TypeTestCase;

class UserTypeTest extends TypeTestCase
{
    public function testSubmitData()
    {
        $formData =[
            'id' => '1',
            'email' => 'vetal1199@gmail.com',
            'username' => 'trndo',
            'plainPassword' => '1234'
        ];

        $objectToCompare = new User();

        $form = $this->factory->create(UserType::class, $objectToCompare);

        $object = new User();

        $form->submit($formData);

        self::assertTrue($form->isSynchronized());

        self::assertEquals($object,$objectToCompare);

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            self::assertArrayHasKey($key, $children);
        }
    }
}