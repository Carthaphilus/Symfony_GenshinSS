<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Arme
 *
 * @ApiResource()
 * @ORM\Table(name="arme", indexes={@ORM\Index(name="FK_Arme_Arme_Type", columns={"arme_type_id"})})
 * @ORM\Entity
 */
class Arme
{
    /**
     * @var int
     *
     * @ORM\Column(name="arme_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $armeId;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_arme", type="string", length=150, nullable=false)
     */
    private $nomArme = '';

    /**
     * @var string
     *
     * @ORM\Column(name="image_arme", type="string", length=150, nullable=false)
     */
    private $imageArme = '';

    /**
     * @var int
     *
     * @ORM\Column(name="rarete", type="integer", nullable=false)
     */
    private $rarete;

    /**
     * @var \ArmeType
     *
     * @ORM\ManyToOne(targetEntity="ArmeType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arme_type_id", referencedColumnName="arme_type_id")
     * })
     */
    private $armeType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Niveau", inversedBy="arme")
     * @ORM\JoinTable(name="arme_niveau",
     *   joinColumns={
     *     @ORM\JoinColumn(name="arme_id", referencedColumnName="arme_id")
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
    public function __construct()
    {
        $this->niveau = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getArmeId(): ?int
    {
        return $this->armeId;
    }

    public function getNomArme(): ?string
    {
        return $this->nomArme;
    }

    public function setNomArme(string $nomArme): self
    {
        $this->nomArme = $nomArme;

        return $this;
    }

    public function getImageArme(): ?string
    {
        return $this->imageArme;
    }

    public function setImageArme(string $imageArme): self
    {
        $this->imageArme = $imageArme;

        return $this;
    }

    public function getRarete(): ?int
    {
        return $this->rarete;
    }

    public function setRarete(int $rarete): self
    {
        $this->rarete = $rarete;

        return $this;
    }

    public function getArmeType(): ?ArmeType
    {
        return $this->armeType;
    }

    public function setArmeType(?ArmeType $armeType): self
    {
        $this->armeType = $armeType;

        return $this;
    }

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveau(): Collection
    {
        return $this->niveau;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveau->contains($niveau)) {
            $this->niveau[] = $niveau;
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        $this->niveau->removeElement($niveau);

        return $this;
    }

}
