<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OeuvreRepository")
 */
class Oeuvre
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     * @Assert\File(mimeTypes = {"image/jpeg"})
     */
    private $img;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
  

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longueur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $largeur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hauteur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $diametre;

    /**
     * @ORM\Column(type="text")
     */
    private $periodcreation;



    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Exposition", inversedBy="oeuvres")
     */
    private $expositions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="oeuvres")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etat", inversedBy="oeuvres")
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Position", inversedBy="oeuvres")
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="oeuvre")
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Artiste", mappedBy="oeuvres")
     */
    private $artistes;

    public function __construct()
    {
        $this->artistes = new ArrayCollection();
        $this->expositions = new ArrayCollection();
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(?float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?float
    {
        return $this->hauteur;
    }

    public function setHauteur(?float $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getDiametre(): ?float
    {
        return $this->diametre;
    }

    public function setDiametre(?float $diametre): self
    {
        $this->diametre = $diametre;

        return $this;
    }

    public function getPeriodcreation(): ?string
    {
        return $this->periodcreation;
    }

    public function setPeriodcreation(string $periodcreation): self
    {
        $this->periodcreation = $periodcreation;

        return $this;
    }


    /**
     * @return Collection|Exposition[]
     */
    public function getExpositions(): Collection
    {
        return $this->expositions;
    }

    public function addExposition(Exposition $exposition): self
    {
        if (!$this->expositions->contains($exposition)) {
            $this->expositions[] = $exposition;
        }

        return $this;
    }

    public function removeExposition(Exposition $exposition): self
    {
        if ($this->expositions->contains($exposition)) {
            $this->expositions->removeElement($exposition);
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setOeuvre($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getOeuvre() === $this) {
                $medium->setOeuvre(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|Artiste[]
     */
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes[] = $artiste;
            $artiste->addOeuvre($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        if ($this->artistes->contains($artiste)) {
            $this->artistes->removeElement($artiste);
            $artiste->removeOeuvre($this);
        }

        return $this;
    }
}
