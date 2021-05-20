<?php

namespace App\Entity;

use App\Repository\ArmeNiveauRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArmeNiveauRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"arme": "exact", "niveau":"exact"})
 */
class ArmeNiveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="arme_niveau_id", type="integer", nullable=false)
     */
    private $arme_niveau_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Arme", inversedBy="arme_niveau")
     * @ORM\JoinColumn(referencedColumnName="arme_id", nullable=false)
     */
    private $arme;
    
    /**
     * @ORM\ManyToOne(targetEntity="Niveau", inversedBy="arme_niveau")
     * @ORM\JoinColumn(referencedColumnName="niveau_id", nullable=false)
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $atk;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $stat_secondaire;

    public function getArmeNiveauId(): ?int
    {
        return $this->arme_niveau_id;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function getStatSecondaire(): ?string
    {
        return $this->stat_secondaire;
    }

    public function setStatSecondaire(string $stat_secondaire): self
    {
        $this->stat_secondaire = $stat_secondaire;

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

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
