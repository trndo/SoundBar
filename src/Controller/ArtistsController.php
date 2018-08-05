<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 03.08.18
 * Time: 16:24
 */

namespace App\Controller;

use App\Entity\Artists;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistsController extends AbstractController
{
    /**
     * @Route("/artsist",name="artists")
     */
    public function artist()
    {
        $repoSongs=$this->getDoctrine()->getRepository(Artists::class);
        $artists=$repoSongs->findAll();

        return $this->render('page_content/artist.html.twig',[
            'artists' => $artists]);
    }

}