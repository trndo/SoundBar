<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 30.07.18
 * Time: 20:42
 */

namespace App\Forms;
use App\Entity\Songs;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Styles;
use App\Entity\Artists;

/**
 * Class SongInfoModel use for building AddSongType.
 *
 * It use parameters and methods from Songs and Styles models.
 *
 * @package App\Forms
 */
class SongInfoModel
{
    public $song_name;

    public $location;
    /**
     *
     * @Assert\NotBlank(message="Please upload mp3 file")
     * @Assert\File(mimeTypes={ "audio/mpeg" })
     *
     */
    public $path;

    public $artist;

    public $description;

    public $style_name;

    /**
     * @return mixed
     */
    public function getStyleName(): ?Styles
    {
        return $this->style_name;
    }

    /**
     * @param mixed $style_name
     */
    public function setStyleName(?Styles $style_name): void
    {
        $this->style_name = $style_name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSongName()
    {
        return $this->song_name;
    }

    /**
     * @param mixed $song_name
     */
    public function setSongName($song_name): void
    {
        $this->song_name = $song_name;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getArtist(): ?Artists
    {
        return $this->artist;
    }

    /**
     * @param mixed $artist_name
     */
    public function setArtis(?Artists $artist): void
    {
        $this->artist = $artist;
    }

}