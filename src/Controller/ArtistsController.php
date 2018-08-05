<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 03.08.18
 * Time: 16:24
 */

namespace App\Controller;

use App\Entity\Artists;
use App\Entity\Songs;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistsController extends AbstractController
{
    /**
     * This method receive artists information from
     *
     * database.
     *
     * @Route("/artsist",name="artists")
     */
    public function artist()
    {
        $repoSongs=$this->getDoctrine()->getRepository(Artists::class);
        $artists=$repoSongs->findAll();

        return $this->render('page_content/artist.html.twig',[
            'artists' => $artists]);
    }

    /**
     * This method receive songs information
     *
     * from database.
     *
     * @Route("/showSong/{id}",name="showSong")
     */
    public function showSong($id)
    {
        $repoSongs=$this->getDoctrine()->getRepository(Songs::class);
        $songs=$repoSongs->findBy(['Artist'=> $id]);

        return $this->render('page_content/home.html.twig',[
            'songs' => $songs]);
    }
}