<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Element
 *
 * @ApiResource(normalizationContext={"groups"={"element:read"}},denormalizationContext={"groups"={"element:write"}})
 * @ORM\Table(name="element")
 * @ORM\Entity
 */
class Element
{
    /**
     * @var int
     *
     * @ORM\Column(name="element_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"personnage:read","element:read"})
     */
    private $elementId;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=false)
     * @Groups({"personnage:read","element:read"})
     */
    private $label = '';

    public function getElementId(): ?int
    {
        return $this->elementId;
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


}
