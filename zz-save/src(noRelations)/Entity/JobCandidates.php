<?php

namespace App\Entity;

use App\Repository\JobCandidatesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobCandidatesRepository::class)]
class JobCandidates
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $aproved = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dt_creation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAproved(): ?bool
    {
        return $this->aproved;
    }

    public function setAproved(bool $aproved): static
    {
        $this->aproved = $aproved;

        return $this;
    }

    public function getDtCreation(): ?\DateTimeInterface
    {
        return $this->dt_creation;
    }

    public function setDtCreation(\DateTimeInterface $dt_creation): static
    {
        $this->dt_creation = $dt_creation;

        return $this;
    }
}
