<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 *
 * @ApiResource()
 * @ORM\Table(name="competence", indexes={@ORM\Index(name="FK_Personnage_Personnage_competence", columns={"personnage_id"}), @ORM\Index(name="FK_Type_competence_Personnage_competence", columns={"type_competence_id"})})
 * @ORM\Entity
 */
class Competence
{
    /**
     * @var int
     *
     * @ORM\Column(name="competence_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $competenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="personnage_competence_label", type="string", length=150, nullable=false)
     */
    private $personnageCompetenceLabel = '';

    /**
     * @var int
     *
     * @ORM\Column(name="ascension", type="integer", nullable=false)
     */
    private $ascension;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_degats", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentageDegats = '0';

    /**
     * @var \Personnage
     *
     * @ORM\ManyToOne(targetEntity="Personnage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personnage_id", referencedColumnName="personnage_id")
     * })
     */
    private $personnage;

    /**
     * @var \TypeCompetence
     *
     * @ORM\ManyToOne(targetEntity="TypeCompetence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_competence_id", referencedColumnName="type_competence_id")
     * })
     */
    private $typeCompetence;

    public function getCompetenceId(): ?int
    {
        return $this->competenceId;
    }

    public function getPersonnageCompetenceLabel(): ?string
    {
        return $this->personnageCompetenceLabel;
    }

    public function setPersonnageCompetenceLabel(string $personnageCompetenceLabel): self
    {
        $this->personnageCompetenceLabel = $personnageCompetenceLabel;

        return $this;
    }

    public function getAscension(): ?int
    {
        return $this->ascension;
    }

    public function setAscension(int $ascension): self
    {
        $this->ascension = $ascension;

        return $this;
    }

    public function getPourcentageDegats(): ?float
    {
        return $this->pourcentageDegats;
    }

    public function setPourcentageDegats(float $pourcentageDegats): self
    {
        $this->pourcentageDegats = $pourcentageDegats;

        return $this;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(?Personnage $personnage): self
    {
        $this->personnage = $personnage;

        return $this;
    }

    public function getTypeCompetence(): ?TypeCompetence
    {
        return $this->typeCompetence;
    }

    public function setTypeCompetence(?TypeCompetence $typeCompetence): self
    {
        $this->typeCompetence = $typeCompetence;

        return $this;
    }


}
