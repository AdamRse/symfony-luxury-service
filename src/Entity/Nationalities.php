<?php

namespace App\Entity;

use App\Repository\NationalitiesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NationalitiesRepository::class)]
class Nationalities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\ManyToOne(inversedBy: 'nationality')]
    private ?Candidates $candidates = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getCandidates(): ?Candidates
    {
        return $this->candidates;
    }

    public function setCandidates(?Candidates $candidates): static
    {
        $this->candidates = $candidates;

        return $this;
    }
}
