<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 20:17
 */

namespace App\Tests\Forms;

use App\Entity\Artists;
use App\Forms\ArtistType;
use Symfony\Component\Form\Test\TypeTestCase;

class ArtistTypeTest extends TypeTestCase
{

    public function testSubmitData()
    {
        $formData =[
            'Artist_name'=>'Imagine Dragons',
            'year'=>'Imagine Dragons',
        ];

        $objectToCompare = new Artists();

        $form = $this->factory->create(ArtistType::class, $objectToCompare);

        $object = new Artists();

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