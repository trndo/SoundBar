<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 10:37
 */

namespace App\Controller;

use App\Entity\Songs;
use App\Repository\SongsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchResultListController extends AbstractController
{
    /**
     *  This method receive songs information
     *
     * from database.
     *
     * @Route("/result", name="searchResult")
     */
    public function showSearchResult(Request $request)
    {
        $searchValue=$request->query->get('searchValue');

        /** @var SongsRepository  $repoSongs */
        $repoSongs=$this->getDoctrine()->getRepository(Songs::class);

        $songs=$repoSongs->findBySearchValue($searchValue);

        return $this->render('page_content/searchresult.html.twig',[
            'songs' => $songs]);
    }

}