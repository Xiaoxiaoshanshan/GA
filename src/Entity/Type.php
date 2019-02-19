<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $libellefr;

    /**
     * @ORM\Column(type="text")
     */
    private $libelleen;

    /**
     * @ORM\Column(type="text")
     */
    private $libellecn;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oeuvre", mappedBy="type")
     */
    private $oeuvres;

    public function __construct()
    {
        $this->oeuvres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellefr(): ?string
    {
        return $this->libellefr;
    }

    public function setLibellefr(string $libellefr): self
    {
        $this->libellefr = $libellefr;

        return $this;
    }

    public function getLibelleen(): ?string
    {
        return $this->libelleen;
    }

    public function setLibelleen(string $libelleen): self
    {
        $this->libelleen = $libelleen;

        return $this;
    }

    public function getLibellecn(): ?string
    {
        return $this->libellecn;
    }

    public function setLibellecn(string $libellecn): self
    {
        $this->libellecn = $libellecn;

        return $this;
    }

    /**
     * @return Collection|Oeuvre[]
     */
    public function getOeuvres(): Collection
    {
        return $this->oeuvres;
    }

    public function addOeuvre(Oeuvre $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres[] = $oeuvre;
            $oeuvre->setType($this);
        }

        return $this;
    }

    public function removeOeuvre(Oeuvre $oeuvre): self
    {
        if ($this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->removeElement($oeuvre);
            // set the owning side to null (unless already changed)
            if ($oeuvre->getType() === $this) {
                $oeuvre->setType(null);
            }
        }

        return $this;
    }
}
