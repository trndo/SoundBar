<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 30.07.18
 * Time: 18:39
 */

namespace App\Forms;

use App\Entity\Artists;
use App\Entity\Songs;
use App\Repository\ArtistsRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Styles;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddSongType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('artist',EntityType::class,[
                'query_builder'=>function(ArtistsRepository $repo){
                return $repo->createQueryBuilder('a')
                            ->orderBy('a.id','DESC');
                },
                'choice_label'=>'artist_name',
                'class'=>Artists::class])
            ->add('song_name',TextType::class)
            ->add('description',TextType::class)
            ->add('location',TextType::class)
            ->add('style_name',EntityType::class,[
                'choice_label'=>'style_name',
                'class'=>Styles::class])
            ->add('path',FileType::class)
            ->add('save',SubmitType::class)
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SongInfoModel::class
        ]);
    }
}
