<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumsRepository")
 */
class Albums
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AlbumName;

    /**
     * @ORM\Column(type="integer")
     */
    private $ArtistId;

    /**
     * @ORM\Column(type="integer")
     */
    private $StyleId;

    /**
     * @ORM\Column(type="integer")
     */
    private $Year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    public function getId()
    {
        return $this->id;
    }

    public function getAlbumName(): ?string
    {
        return $this->AlbumName;
    }

    public function setAlbumName(string $AlbumName): self
    {
        $this->AlbumName = $AlbumName;

        return $this;
    }

    public function getArtistId(): ?int
    {
        return $this->ArtistId;
    }

    public function setArtistId(int $ArtistId): self
    {
        $this->ArtistId = $ArtistId;

        return $this;
    }

    public function getStyleId(): ?int
    {
        return $this->StyleId;
    }

    public function setStyleId(int $StyleId): self
    {
        $this->StyleId = $StyleId;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(int $Year): self
    {
        $this->Year = $Year;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }
}
