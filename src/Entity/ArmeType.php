<?php

namespace App\Entity;

use App\Repository\ArmeTypeRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ArmeType
 *
 * @ApiResource(normalizationContext={"groups"={"armetype:read"}},denormalizationContext={"groups"={"armetype:write"}})
 * @ORM\Table(name="arme_type")
 * @ORM\Entity(repositoryClass=ArmeTypeRepository::class)
 */
class ArmeType
{
    /**
     * @var int
     *
     * @ORM\Column(name="arme_type_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"personnage:read","armetype:read","arme:read"})
     */
    private $armeTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="label_type", type="string", length=150, nullable=false)
     * @Groups({"personnage:read","armetype:read","arme:read"})
     */
    private $labelType;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Arme", mappedBy="armeType")
     * @Groups({"personnage:read","armetype:read","arme:read"})
     */
    private $arme;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Personnage", mappedBy="armeType")
     * @Groups({"personnage:read","armetype:read","arme:read"})
     */
    private $personnage;
    

    public function getArmeTypeId(): ?int
    {
        return $this->armeTypeId;
    }

    public function getLabelType(): ?string
    {
        return $this->labelType;
    }

    public function setLabelType(string $labelType): self
    {
        $this->labelType = $labelType;

        return $this;
    }


}
