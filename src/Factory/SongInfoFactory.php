<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 01.08.18
 * Time: 14:25
 */

namespace App\Factory;


use App\Entity\Artists;
use App\Entity\Songs;
use App\Service\FileSystem\FileManager;
use wapmorgan\Mp3Info\Mp3Info;

class SongInfoFactory
{
    private $filemanager;
    private $song;
    private $model;

    public function __construct($model,FileManager $fileManager)
    {
        $this->song = new Songs();
        $this->model = $model;
        $this->filemanager= $fileManager;
    }

    public function create(){

        $this->addInfoFromSongInfoModel();
        $this->addInfoFromFileMp3Info();

        return $this->song;
    }

    private function addInfoFromSongInfoModel()
    {
        $this->song->setStyle($this->model->getStyleName());
        $this->song->setAddedAt(new \DateTime());
        $this->song->setSongName($this->model->getSongName());
        $this->song->setLocation($this->model->getLocation());
        $this->song->setDescription($this->model->getDescription());
        $this->song->setArtist($this->model->getArtist());
        if ($songName = $this->filemanager->upload($this->model->getPath())) {
            $this->song->setPath($songName);
        }

    }

    private function addInfoFromFileMp3Info()
    {
        $audio = new Mp3Info($this->filemanager->realPath($this->song->getPath()));
        $this->song->setDuration(gmdate("H:i:s",$audio->duration));
        $this->song->setSize(round($audio->audioSize/1048576));
        $this->song->setBitRate($audio->bitRate/1000);
    }

}