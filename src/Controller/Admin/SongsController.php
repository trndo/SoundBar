<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 17:10
 */

namespace App\Controller\Admin;

use App\Entity\Songs;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SongsController extends AbstractController
{
    /**
     * This method receive songs
     *
     * from Artists class and remove
     *
     * them from database.
     *
     * @Route("/deleteSong/{id}",name="deleteSong")
     */
    public function deleteSong($id)
    {
        $em = $this->getDoctrine()->getManager();
        $songs = $em->getRepository(Songs::class)->findOneBy(['id' => $id]);

        $em->remove($songs);
        $em->flush();

        return $this->redirectToRoute('home');
    }

}