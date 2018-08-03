<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 28.07.18
 * Time: 14:36
 */

namespace App\Controller;

use App\Entity\Songs;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{
    /**
     * @Route("/",name="template")
     */
    public function index()
    {
        $repoSongs=$this->getDoctrine()->getRepository(Songs::class);
        $songs=$repoSongs->findAll();

        return $this->render('page_content/home.html.twig',[
            'songs' => $songs]);


    }

}

