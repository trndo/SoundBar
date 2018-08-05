<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 03.08.18
 * Time: 21:03
 */

namespace App\Controller;

use App\Entity\Songs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistSongsController extends AbstractController
{
    /**
     * @Route("/showSong/{id}",name="showSong")
     */
    public function showSong($id)
    {
        $repoSongs=$this->getDoctrine()->getRepository(Songs::class);
        $songs=$repoSongs->findBy(['Artist'=> $id]);

        return $this->render('page_content/artistsongs.html.twig',[
            'songs' => $songs]);
    }

}