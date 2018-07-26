<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StylesRepository")
 */
class Styles
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
    private $StyleName;

    public function getId()
    {
        return $this->id;
    }

    public function getStyleName(): ?string
    {
        return $this->StyleName;
    }

    public function setStyleName(string $StyleName): self
    {
        $this->StyleName = $StyleName;

        return $this;
    }
}
