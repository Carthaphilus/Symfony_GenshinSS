<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeCompetence
 *
 * @ApiResource()
 * @ORM\Table(name="type_competence")
 * @ORM\Entity
 */
class TypeCompetence
{
    /**
     * @var int
     *
     * @ORM\Column(name="type_competence_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeCompetenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="type_competence_label", type="string", length=100, nullable=false)
     */
    private $typeCompetenceLabel;

    public function getTypeCompetenceId(): ?int
    {
        return $this->typeCompetenceId;
    }

    public function getTypeCompetenceLabel(): ?string
    {
        return $this->typeCompetenceLabel;
    }

    public function setTypeCompetenceLabel(string $typeCompetenceLabel): self
    {
        $this->typeCompetenceLabel = $typeCompetenceLabel;

        return $this;
    }


}
