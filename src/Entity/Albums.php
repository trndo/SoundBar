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

    private $Year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Artist;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Styles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Style;

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

    public function getArtist(): ?Artists
    {
        return $this->Artist;
    }

    public function setArtist(?Artists $Artist): self
    {
        $this->Artist = $Artist;

        return $this;
    }

    public function getStyle(): ?Styles
    {
        return $this->Style;
    }

    public function setStyle(?Styles $Style): self
    {
        $this->Style = $Style;

        return $this;
    }
}
