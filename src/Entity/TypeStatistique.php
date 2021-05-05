<?php

namespace App\Entity;

use App\Repository\TypeStatistiqueRepository;
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
}
