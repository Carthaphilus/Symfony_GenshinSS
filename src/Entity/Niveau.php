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

}
