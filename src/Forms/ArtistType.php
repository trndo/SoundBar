<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 01.08.18
 * Time: 16:29
 */

namespace App\Forms;

use App\Entity\Artists;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('artist_name',TextType::class)
            ->add('year',DateType::class, [
                  'widget' => 'single_text',
                 'format' => 'yyyy'])
            ->add('image',FileType::class)
            ->add('save',SubmitType::class)
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artists::class
        ]);
    }
}