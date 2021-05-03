<?php

namespace App\Entity;

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
 * @ORM\Entity
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
     * @ORM\ManyToMany(targetEntity="Arme", mappedBy="niveau")
     */
    private $arme;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personnage", mappedBy="niveau")
     */
    private $personnage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->arme = new \Doctrine\Common\Collections\ArrayCollection();
        $this->personnage = new \Doctrine\Common\Collections\ArrayCollection();
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
        return $this->arme;
    }

    public function addArme(Arme $arme): self
    {
        if (!$this->arme->contains($arme)) {
            $this->arme[] = $arme;
            $arme->addNiveau($this);
        }

        return $this;
    }

    public function removeArme(Arme $arme): self
    {
        if ($this->arme->removeElement($arme)) {
            $arme->removeNiveau($this);
        }

        return $this;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getPersonnage(): Collection
    {
        return $this->personnage;
    }

    public function addPersonnage(Personnage $personnage): self
    {
        if (!$this->personnage->contains($personnage)) {
            $this->personnage[] = $personnage;
            $personnage->addNiveau($this);
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        if ($this->personnage->removeElement($personnage)) {
            $personnage->removeNiveau($this);
        }

        return $this;
    }

}
