<?php

namespace App\Entity;

use App\Repository\JobCandidatesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'jobCandidates')]
    private ?Jobs $id_job = null;

    #[ORM\ManyToOne(inversedBy: 'jobCandidates')]
    private ?Candidates $id_candidate = null;

    public function __construct()
    {
        $this->id_job = new ArrayCollection();
        $this->id_candidate = new ArrayCollection();
    }

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

    public function getIdJob(): ?Jobs
    {
        return $this->id_job;
    }

    public function setIdJob(?Jobs $id_job): static
    {
        $this->id_job = $id_job;

        return $this;
    }

    public function getIdCandidate(): ?Candidates
    {
        return $this->id_candidate;
    }

    public function setIdCandidate(?Candidates $id_candidate): static
    {
        $this->id_candidate = $id_candidate;

        return $this;
    }
}
