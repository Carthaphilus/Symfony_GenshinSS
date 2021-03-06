<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArtefactStatEffetRepository;
use Symfony\Component\Serializer\Annotation\Groups ;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArtefactStatEffetRepository::class)
 */
class ArtefactStatEffet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity=Artefact::class, inversedBy="artefactStatEffets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artefact;

    /**
     * @ORM\ManyToOne(targetEntity=TypeStatistique::class, inversedBy="artefact_stat_effet")
     * @ORM\JoinColumn(referencedColumnName="type_statistiques_id",name="type_statistiques_id",nullable=false)
     */
    private $typeStatistique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getArtefact(): ?Artefact
    {
        return $this->artefact;
    }

    public function setArtefact(?Artefact $artefact): self
    {
        $this->artefact = $artefact;

        return $this;
    }

    public function getTypeStatistique(): ?TypeStatistique
    {
        return $this->typeStatistique;
    }

    public function setTypeStatistique(?TypeStatistique $typeStatistique): self
    {
        $this->typeStatistique = $typeStatistique;

        return $this;
    }
}
