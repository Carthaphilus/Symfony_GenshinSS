<?php

namespace App\Entity;

use App\Repository\ArmeNiveauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmeNiveauRepository::class)
 */
class ArmeNiveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
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

    public function getArmenNveauId(): ?int
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
}
