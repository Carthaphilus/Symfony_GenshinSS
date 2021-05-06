<?php

namespace App\Entity;

use App\Repository\ArmeTypeStatistiqueRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ApiResource()
 * @ORM\Entity(repositoryClass=ArmeTypeStatistiqueRepository::class)
 */
class ArmeTypeStatistique
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $arme_type_statistique_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Arme", inversedBy="arme_type_statistique")
     * @ORM\JoinColumn(referencedColumnName="arme_id", nullable=false)
     */
    private $arme;
    
    /**
     * @ORM\ManyToOne(targetEntity="TypeStatistique", inversedBy="arme_type_statistique")
     * @ORM\JoinColumn(referencedColumnName="type_statistiques_id", nullable=false)
     */
    private $type_statistique;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeur_stat;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $raffinement;

    public function getValeurStat(): ?int
    {
        return $this->valeur_stat;
    }

    public function getRaffinement(): ?string
    {
        return $this->raffinement;
    }

    public function setRaffinement(string $raffinement): self
    {
        $this->raffinement = $raffinement;

        return $this;
    }
}
