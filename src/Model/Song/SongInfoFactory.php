<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 01.08.18
 * Time: 14:25
 */

namespace App\Model\Song;


use App\Entity\Artists;
use App\Entity\Songs;
use App\Service\FileSystem\FileManager;
use wapmorgan\Mp3Info\Mp3Info;

class SongInfoFactory
{
    private $song;
    private $artist;
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($className)
    {
        switch ($className){
            case 'Artists':
                $this->artist = new Artists();
            break;
            case 'Songs':
                $this->song = new Songs();
        }
    }
    public function addArtistInfo(FileManager $fileManager)
    {
        $this->artist->setArtistName($this->model->getArtistName());
        $this->artist->setYear($this->model->getYear());
        $img = $this->model->getImage();
       /* echo '<pre>';
         var_dump($img);
        echo '</pre>';*/
           if ($pictureName = $fileManager->upload($img)) {
               $this->artist->setImage($pictureName);
                }

    }
    public function addInfoFromSongInfoModel(FileManager $fileManager)
    {
        $this->song->setStyle($this->model->getStyleName());
        $this->song->setAddedAt(new \DateTime());
        $this->song->setSongName($this->model->getSongName());
        $this->song->setLocation($this->model->getLocation());
        $this->song->setDescription($this->model->getDescription());
        $this->song->setArtist($this->model->getArtist());
        if ($songName = $fileManager->upload($this->model->getPath())) {
            $this->song->setPath($songName);
        }

    }
    public function addInfoFromFileMp3Info(FileManager $fileManager)
    {
        $audio = new Mp3Info($fileManager->realPath($this->song->getPath()));
        $this->song->setDuration(gmdate("H:i:s",$audio->duration));
        $this->song->setSize(round($audio->audioSize/1048576),2);
        $this->song->setBitRate($audio->bitRate/1000);
    }

    /**
     * @return Songs
     */
    public function getSong(): Songs
    {
        return $this->song;
    }

    /**
     * @param Songs $song
     */
    public function setSong(Songs $song): void
    {
        $this->song = $song;
    }

    /**
     * @return Artists
     */
    public function getArtist(): Artists
    {
        return $this->artist;
    }

    /**
     * @param Artists $artist
     */
    public function setArtist(Artists $artist): void
    {
        $this->artist = $artist;
    }

}