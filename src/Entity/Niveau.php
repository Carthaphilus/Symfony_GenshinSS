<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Niveau
 *
 * @ApiResource()
 * @ORM\Table(name="niveau")
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
{
    /**
     * @var int
     *
     * @ORM\Column(name="niveau_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $niveauId;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_niveau", type="integer", nullable=false)
     */
    private $nbNiveau;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="ArmeNiveau", mappedBy="niveau")
     */
    private $arme_niveau;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="PersonnageNiveau", mappedBy="niveau")
     */
    private $personnage_niveau;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personnage_id = new \Doctrine\Common\Collections\ArrayCollection();
        $this->arme_niveau = new ArrayCollection();
        $this->personnage_niveau = new ArrayCollection();
    }

    public function getNiveauId(): ?int
    {
        return $this->niveauId;
    }

    public function getNbNiveau(): ?int
    {
        return $this->nbNiveau;
    }

    public function setNbNiveau(int $nbNiveau): self
    {
        $this->nbNiveau = $nbNiveau;

        return $this;
    }

    /**
     * @return Collection|Arme[]
     */
    public function getArme(): Collection
    {
        return $this->arme_niveau;
    }
    
    /**
     * @return Collection|Personnage[]
     */
    public function getPersonnage(): Collection
    {
        return $this->personnage_niveau;
    }

    public function addPersonnage(Personnage $personnage): self
    {
        if (!$this->personnage_niveau->contains($personnage)) {
            $this->personnage_niveau[] = $personnage;
            $personnage->addNiveau($this);
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        if ($this->personnage_niveau->removeElement($personnage)) {
            $personnage->removeNiveau($this);
        }

        return $this;
    }

    /**
     * @return Collection|ArmeNiveau[]
     */
    public function getArmeNiveau(): Collection
    {
        return $this->arme_niveau;
    }

    public function addArmeNiveau(ArmeNiveau $armeNiveau): self
    {
        if (!$this->arme_niveau->contains($armeNiveau)) {
            $this->arme_niveau[] = $armeNiveau;
            $armeNiveau->setNiveau($this);
        }

        return $this;
    }

    public function removeArmeNiveau(ArmeNiveau $armeNiveau): self
    {
        if ($this->arme_niveau->removeElement($armeNiveau)) {
            // set the owning side to null (unless already changed)
            if ($armeNiveau->getNiveau() === $this) {
                $armeNiveau->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PersonnageNiveau[]
     */
    public function getPersonnageNiveau(): Collection
    {
        return $this->personnage_niveau;
    }

    public function addPersonnageNiveau(PersonnageNiveau $personnageNiveau): self
    {
        if (!$this->personnage_niveau->contains($personnageNiveau)) {
            $this->personnage_niveau[] = $personnageNiveau;
            $personnageNiveau->setNiveau($this);
        }

        return $this;
    }

    public function removePersonnageNiveau(PersonnageNiveau $personnageNiveau): self
    {
        if ($this->personnage_niveau->removeElement($personnageNiveau)) {
            // set the owning side to null (unless already changed)
            if ($personnageNiveau->getNiveau() === $this) {
                $personnageNiveau->setNiveau(null);
            }
        }

        return $this;
    }

}
