<?php

namespace App\Entity;

use App\Repository\ArmeRepository;
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
 * @ORM\Entity(repositoryClass=ArmeRepository::class)
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
     * @ORM\OneToMany(targetEntity="ArmeNiveau", mappedBy="arme")
     */
    private $arme_niveau;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="ArmeTypeStatistique", mappedBy="arme")
     */
    private $arme_type_statistique;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->arme_niveau = new \Doctrine\Common\Collections\ArrayCollection();
        $this->arme_type_statistique = new \Doctrine\Common\Collections\ArrayCollection();
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
            $armeNiveau->setArme($this);
        }

        return $this;
    }

    public function removeArmeNiveau(ArmeNiveau $armeNiveau): self
    {
        if ($this->arme_niveau->removeElement($armeNiveau)) {
            // set the owning side to null (unless already changed)
            if ($armeNiveau->getArme() === $this) {
                $armeNiveau->setArme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ArmeTypeStatistique[]
     */
    public function getArmeTypeStatistique(): Collection
    {
        return $this->arme_type_statistique;
    }

    public function addArmeTypeStatistique(ArmeTypeStatistique $armeTypeStatistique): self
    {
        if (!$this->arme_type_statistique->contains($armeTypeStatistique)) {
            $this->arme_type_statistique[] = $armeTypeStatistique;
            $armeTypeStatistique->setArme($this);
        }

        return $this;
    }

    public function removeArmeTypeStatistique(ArmeTypeStatistique $armeTypeStatistique): self
    {
        if ($this->arme_type_statistique->removeElement($armeTypeStatistique)) {
            // set the owning side to null (unless already changed)
            if ($armeTypeStatistique->getArme() === $this) {
                $armeTypeStatistique->setArme(null);
            }
        }

        return $this;
    }
}
