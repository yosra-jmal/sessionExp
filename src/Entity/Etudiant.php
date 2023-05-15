<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\Column]
    #[Assert\NotBlank(message:'le champs Nsc ne doit pas etre vide')]
    private ?int $nsc = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'le champs email ne doit pas etre vide')]
    private ?string $email = null;

    public function getNsc(): ?int
    {
        return $this->nsc;
    }

    /**
     * @param int|null $nsc
     */
    public function setNsc(?int $nsc): void
    {
        $this->nsc = $nsc;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
