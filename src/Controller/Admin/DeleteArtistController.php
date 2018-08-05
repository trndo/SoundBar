<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.08.18
 * Time: 18:06
 */

namespace App\Controller\Admin;

use App\Entity\Songs;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Artists;

class DeleteArtistController extends AbstractController
{
    /**
     * This method receive songs and artists
     *
     * from Artists and Songs classes and remove
     *
     * them from database.
     *
     * @Route("/deleteArtist/{id}",name="deleteArtist")
     */
    public function deleteArtist($id)
    {
        $em = $this->getDoctrine()->getManager();
        $artist = $em->getRepository(Artists::class)->findOneBy(['id' => $id]);
        $songs = $em->getRepository(Songs::class)->findBy(['Artist' => $id]);

        foreach($songs as $song){
            $em->remove($song);
        }
        $em->flush();
        $em->remove($artist);
        $em->flush();

        return $this->redirectToRoute('home');
    }
}