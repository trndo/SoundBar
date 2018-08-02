<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistsRepository")
 */
class Artists
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
    private $Artist_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Please upload jpeg,png file")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png" })
     *
     */
    private $Image;

    public function getId()
    {
        return $this->id;
    }

    public function getArtistName(): ?string
    {
        return $this->Artist_name;
    }

    public function setArtistName(string $Artist_name): self
    {
        $this->Artist_name = $Artist_name;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->Year;
    }

    public function setYear(\DateTimeInterface $Year): self
    {
        $this->Year = $Year;

        return $this;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image): self
    {
        $this->Image = $Image;

        return $this;
    }
}
