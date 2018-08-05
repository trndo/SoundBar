<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 02.08.18
 * Time: 12:32
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Artists;
use App\Forms\AddSongType;
use App\Forms\ArtistType;
use App\Forms\SongInfoModel;
use App\Factory\SongInfoFactory;
use App\Service\FileSystem\FileManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddingPageController extends AbstractController
{
    /**
     * @Route("/addSong",name="addSong")
     */
    public function addSong(Request $request,FileManager $fileManager,SongInfoModel $model)
    {
        $form = $this->createForm(AddSongType::class,$model);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $factory = new SongInfoFactory($model,$fileManager);
            $song = $factory->create();

            $em = $this->getDoctrine()->getManager();
            $em->persist($song);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('page_content/adding.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/addArtist",name="artist")
     */
    public function addArtist(Request $request,FileManager $fileManager)
    {
        $artist = new Artists();
        $form = $this->createForm(ArtistType::class,$artist);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $img = $data->getImage();
            if ($pictureName = $fileManager->upload($img)) {
                    $data->setImage($pictureName);

                $em = $this->getDoctrine()->getManager();
                $em->persist($artist);
                $em->flush();
            }

            return $this->redirectToRoute('addSong');
        }

        return $this->render('page_content/addartist.html.twig',['form'=>$form->createView()]);
    }

}