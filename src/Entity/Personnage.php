<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Personnage
 *
 * @ApiResource(normalizationContext={"groups"={"personnage:read"}},denormalizationContext={"groups"={"personnage:write"}})
 * @ORM\Table(name="personnage", indexes={@ORM\Index(name="FK_Personnage_Arme_type", columns={"arme_type_id"}), @ORM\Index(name="FK_Personnage_Element", columns={"element_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageRepository")
 */
class Personnage {

    /**
     * @var int
     *
     * @ORM\Column(name="personnage_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"personnage:read"})
     * 
     */
    private $personnageId;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     * @Groups({"personnage:read", "personnage:write"})
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="rarete", type="integer", nullable=false)
     * @Groups({"personnage:read", "personnage:write"})
     */
    private $rarete;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=150, nullable=false)
     * @Groups({"personnage:read", "personnage:write"})
     */
    private $image;

    /**
     * @var \ArmeType
     *
     * @ORM\ManyToOne(targetEntity="ArmeType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arme_type_id", referencedColumnName="arme_type_id")
     * })
     * @Groups({"personnage:read", "personnage:write", "armetype:read", "armetype:write"})
     */
    private $armeType;

    /**
     * @var \Element
     *
     * @ORM\ManyToOne(targetEntity="Element")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="element_id", referencedColumnName="element_id")
     * })
     * @Groups({"personnage:read", "personnage:write", "element:read", "element:write"})
     */
    private $element;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Equipe", mappedBy="personnage")
     */
    private $equipe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Niveau", inversedBy="personnage")
     * @ORM\JoinTable(name="personnage_niveau",
     *   joinColumns={
     *     @ORM\JoinColumn(name="personnage_id", referencedColumnName="personnage_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="niveau_id", referencedColumnName="niveau_id")
     *   }
     * )
     */
    private $niveau;

    /**
     * Constructor
     */
    public function __construct() {
        $this->equipe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->niveau = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getPersonnageId(): ?int {
        return $this->personnageId;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom): self {
        $this->nom = $nom;

        return $this;
    }

    public function getRarete(): ?int {
        return $this->rarete;
    }

    public function setRarete(int $rarete): self {
        $this->rarete = $rarete;

        return $this;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setImage(string $image): self {
        $this->image = $image;

        return $this;
    }

    public function getArmeType(): ?ArmeType {
        return $this->armeType;
    }

    public function setArmeType(?ArmeType $armeType): self {
        $this->armeType = $armeType;

        return $this;
    }

    public function getElement(): ?Element {
        return $this->element;
    }

    public function setElement(?Element $element): self {
        $this->element = $element;

        return $this;
    }

    /**
     * @return Collection|Equipe[]
     */
    public function getEquipe(): Collection {
        return $this->equipe;
    }

    public function addEquipe(Equipe $equipe): self {
        if (!$this->equipe->contains($equipe)) {
            $this->equipe[] = $equipe;
            $equipe->addPersonnage($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self {
        if ($this->equipe->removeElement($equipe)) {
            $equipe->removePersonnage($this);
        }

        return $this;
    }

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveau(): Collection {
        return $this->niveau;
    }

    public function addNiveau(Niveau $niveau): self {
        if (!$this->niveau->contains($niveau)) {
            $this->niveau[] = $niveau;
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self {
        $this->niveau->removeElement($niveau);

        return $this;
    }

}
