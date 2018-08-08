<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 07.08.18
 * Time: 19:49
 */

namespace App\Controller;

use App\Entity\Artists;
use App\Repository\ArtistsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultArtistsListController extends AbstractController
{
    /**
     * @Route("/resultArtist", name="searchResultArtist")
     */
    public function searchArtist(Request $request)
    {
        $searchValueArtists=$request->query->get('searchValueArtists');

        /** @var ArtistsRepository  $repoArtists */
        $repoArtists=$this->getDoctrine()->getRepository(Artists::class);

        $artists=$repoArtists->findBySearchValueArtist($searchValueArtists);

        return $this->render('page_content/searchResultArtist.html.twig',[
            'artists' => $artists]);

    }
}