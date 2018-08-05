<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 15:18
 */

namespace App\Tests\Forms;

use App\Entity\Songs;
use App\Forms\AddSongType;
use Symfony\Component\Form\Test\TypeTestCase;

class AddSongTypeTest extends TypeTestCase
{

    public function testSubmitData()
    {
        $formData =[
            'songName'=>'Beliver',
            'artistName'=>'Imagine Dragons',
            'description' =>'eeeee',
            'location' => 'USA',
            'styleName' => 'Rock'

        ];

        $objectToCompare = new Songs();

        $form = $this->factory->create(AddSongType::class, $objectToCompare);

        $object = new Songs();

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