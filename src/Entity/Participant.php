<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
class Participant
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $cin = null;

    /**
     * @return int|null
     */
    public function getCin(): ?int
    {
        return $this->cin;
    }

    /**
     * @param int|null $cin
     */
    public function setCin(?int $cin): void
    {
        $this->cin = $cin;
    }

    #[ORM\Column(length: 255)]
    private ?string $nomPrenom = null;

    #[ORM\Column(length: 255)]
    private ?string $profession = null;

    #[ORM\Column]
    private ?bool $dispoGroupe = null;

    #[ORM\ManyToOne(inversedBy: 'participants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Session $Session = null;



    public function getNomPrenom(): ?string
    {
        return $this->nomPrenom;
    }

    public function setNomPrenom(string $nomPrenom): self
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function isDispoGroupe(): ?bool
    {
        return $this->dispoGroupe;
    }

    public function setDispoGroupe(bool $dispoGroupe): self
    {
        $this->dispoGroupe = $dispoGroupe;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->Session;
    }

    public function setSession(?Session $Session): self
    {
        $this->Session = $Session;

        return $this;
    }
}
