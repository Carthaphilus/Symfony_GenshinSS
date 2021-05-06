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

    public function getArmeTypeStatistiqueId(): ?int
    {
        return $this->arme_type_statistique_id;
    }

    public function setValeurStat(int $valeur_stat): self
    {
        $this->valeur_stat = $valeur_stat;

        return $this;
    }

    public function getArme(): ?Arme
    {
        return $this->arme;
    }

    public function setArme(?Arme $arme): self
    {
        $this->arme = $arme;

        return $this;
    }

    public function getTypeStatistique(): ?TypeStatistique
    {
        return $this->type_statistique;
    }

    public function setTypeStatistique(?TypeStatistique $type_statistique): self
    {
        $this->type_statistique = $type_statistique;

        return $this;
    }
}
