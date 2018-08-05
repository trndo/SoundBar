<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 04.08.18
 * Time: 12:55
 */

namespace App\Controller;

use App\Entity\Songs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StyleSongsController extends AbstractController
{
    /**
     * @Route("/showStyleSong/{id}",name="showStyleSong")
     */
    public function showSong($id)
    {
        $repoSongs=$this->getDoctrine()->getRepository(Songs::class);
        $songs=$repoSongs->findBy(['Style'=> $id]);

        return $this->render('page_content/stylesongs.html.twig',[
            'songs' => $songs]);
    }

}