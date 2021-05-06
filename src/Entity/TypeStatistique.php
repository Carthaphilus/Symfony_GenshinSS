<?php

namespace App\Entity;

use App\Repository\TypeStatistiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeStatistiqueRepository::class)
 */
class TypeStatistique
{
    

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $type_statistiques_id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $label_type_stat;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="ArmeTypeStatistique", mappedBy="type_statistique")
     */
    private $arme_type_statistique;

    public function __construct()
    {
        $this->arme_type_statistique = new ArrayCollection();
    }

    public function getTypeStatistiquesId(): ?int
    {
        return $this->type_statistiques_id;
    }

    public function getLabelTypeStat(): ?string
    {
        return $this->label_type_stat;
    }

    public function setLabelTypeStat(string $label_type_stat): self
    {
        $this->label_type_stat = $label_type_stat;

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
            $armeTypeStatistique->setTypeStatistique($this);
        }

        return $this;
    }

    public function removeArmeTypeStatistique(ArmeTypeStatistique $armeTypeStatistique): self
    {
        if ($this->arme_type_statistique->removeElement($armeTypeStatistique)) {
            // set the owning side to null (unless already changed)
            if ($armeTypeStatistique->getTypeStatistique() === $this) {
                $armeTypeStatistique->setTypeStatistique(null);
            }
        }

        return $this;
    }
}
