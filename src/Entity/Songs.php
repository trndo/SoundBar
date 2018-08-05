<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SongsRepository")
 */
class Songs
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
    private $SongName;

    /**
     * @ORM\Column(type="string")
     */
    private $Duration;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Path;

    /**
     * @ORM\Column(type="datetime")
     */
    private $added_at;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artists", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Artist;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Styles")
     * @ORM\JoinColumn(nullable=true)
     */
    private $Style;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BitRate;

    public function getId()
    {
        return $this->id;
    }

    public function getSongName(): ?string
    {
        return $this->SongName;
    }

    public function setSongName(string $SongName): self
    {
        $this->SongName = $SongName;
        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->Duration;
    }

    public function setDuration(string $Duration): self
    {
        $this->Duration = $Duration;
        return $this;
    }

    public function getSize(): ?string
    {
        return $this->Size;
    }

    public function setSize(string $Size): self
    {
        $this->Size = $Size;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->Path;
    }

    public function setPath(?string $Path): self
    {
        $this->Path = $Path;

        return $this;
    }

    public function getAddedAt(): ?\DateTimeInterface
    {
        return $this->added_at;
    }

    public function setAddedAt(\DateTimeInterface $added_at): self
    {
        $this->added_at = $added_at;

        return $this;
    }

    public function getArtist(): ?Artists
    {
        return $this->Artist;
    }

    public function setArtist(Artists $Artist): self
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

    public function getBitRate(): ?string
    {
        return $this->BitRate;
    }

    public function setBitRate(string $BitRate): self
    {
        $this->BitRate = $BitRate;

        return $this;
    }

}
