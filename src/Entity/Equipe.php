<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ApiResource()
 * @ORM\Table(name="equipe", indexes={@ORM\Index(name="FK_Equipe_Joueur", columns={"joueur_id"})})
 * @ORM\Entity
 */
class Equipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="equipe_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $equipeId;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=150, nullable=false)
     */
    private $nom;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur_id", referencedColumnName="joueur_id")
     * })
     */
    private $joueur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personnage", inversedBy="equipe")
     * @ORM\JoinTable(name="equipe_personnage",
     *   joinColumns={
     *     @ORM\JoinColumn(name="equipe_id", referencedColumnName="equipe_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="personnage_id", referencedColumnName="personnage_id")
     *   }
     * )
     */
    private $personnage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personnage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getEquipeId(): ?int
    {
        return $this->equipeId;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

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
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        $this->personnage->removeElement($personnage);

        return $this;
    }

}
