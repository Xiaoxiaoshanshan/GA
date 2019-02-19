<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $libellemedia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $typemedia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Oeuvre", inversedBy="media")
     */
    private $oeuvre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellemedia(): ?string
    {
        return $this->libellemedia;
    }

    public function setLibellemedia(?string $libellemedia): self
    {
        $this->libellemedia = $libellemedia;

        return $this;
    }

    public function getTypemedia(): ?string
    {
        return $this->typemedia;
    }

    public function setTypemedia(?string $typemedia): self
    {
        $this->typemedia = $typemedia;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getOeuvre(): ?Oeuvre
    {
        return $this->oeuvre;
    }

    public function setOeuvre(?Oeuvre $oeuvre): self
    {
        $this->oeuvre = $oeuvre;

        return $this;
    }
}
