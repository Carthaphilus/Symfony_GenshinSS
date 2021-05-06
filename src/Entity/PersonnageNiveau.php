<?php

namespace App\Entity;

use App\Repository\PersonnageNiveauRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PersonnageNiveauRepository::class)
 */
class PersonnageNiveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $stat_ascension;

    /**
     * @ORM\Column(type="integer")
     */
    private $atk;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp;

    /**
     * @ORM\Column(type="integer")
     */
    private $def;
    
     /**
     * @ORM\ManyToOne(targetEntity="Personnage", inversedBy="personnage_niveau")
     * @ORM\JoinColumn(referencedColumnName="personnage_id", nullable=false)
     */
    private $personnage;
    
    /**
     * @ORM\ManyToOne(targetEntity="Niveau", inversedBy="personnage_niveau")
     * @ORM\JoinColumn(referencedColumnName="niveau_id", nullable=false)
     */
    private $niveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatAscension(): ?string
    {
        return $this->stat_ascension;
    }

    public function setStatAscension(string $stat_ascension): self
    {
        $this->stat_ascension = $stat_ascension;

        return $this;
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

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getDef(): ?int
    {
        return $this->def;
    }

    public function setDef(int $def): self
    {
        $this->def = $def;

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
