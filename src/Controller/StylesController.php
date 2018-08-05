<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 03.08.18
 * Time: 21:46
 */

namespace App\Controller;

use App\Entity\Songs;
use App\Entity\Styles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StylesController extends AbstractController
{
    /**
     * @Route("/showStyle",name="showStyle")
     */
    public function showStyle()
    {
        $repoSongs=$this->getDoctrine()->getRepository(Styles::class);
        $styles=$repoSongs->findAll();

        return $this->render('page_content/styles.html.twig',[
            'styles' => $styles]);
    }

    /**
     * @Route("/showStyleSong/{id}",name="showStyleSong")
     */
    public function showSong($id)
    {
        $repoSongs=$this->getDoctrine()->getRepository(Songs::class);
        $songs=$repoSongs->findBy(['Style'=> $id]);

        return $this->render('page_content/home.html.twig',[
            'songs' => $songs]);
    }

}