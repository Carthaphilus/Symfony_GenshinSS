<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArtefactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArtefactRepository::class)
 */
class Artefact
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
    private $nbSetArtefact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="text")
     */
    private $labelEffet;

    /**
     * @ORM\OneToMany(targetEntity=ArtefactStatEffet::class, mappedBy="artefact")
     */
    private $artefactStatEffets;

    public function __construct()
    {
        $this->artefactStatEffets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbSetArtefact(): ?int
    {
        return $this->nbSetArtefact;
    }

    public function setNbSetArtefact(int $nbSetArtefact): self
    {
        $this->nbSetArtefact = $nbSetArtefact;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getLabelEffet(): ?string
    {
        return $this->labelEffet;
    }

    public function setLabelEffet(string $labelEffet): self
    {
        $this->labelEffet = $labelEffet;

        return $this;
    }

    /**
     * @return Collection|ArtefactStatEffet[]
     */
    public function getArtefactStatEffets(): Collection
    {
        return $this->artefactStatEffets;
    }

    public function addArtefactStatEffet(ArtefactStatEffet $artefactStatEffet): self
    {
        if (!$this->artefactStatEffets->contains($artefactStatEffet)) {
            $this->artefactStatEffets[] = $artefactStatEffet;
            $artefactStatEffet->setArtefact($this);
        }

        return $this;
    }

    public function removeArtefactStatEffet(ArtefactStatEffet $artefactStatEffet): self
    {
        if ($this->artefactStatEffets->removeElement($artefactStatEffet)) {
            // set the owning side to null (unless already changed)
            if ($artefactStatEffet->getArtefact() === $this) {
                $artefactStatEffet->setArtefact(null);
            }
        }

        return $this;
    }
}
