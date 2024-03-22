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

    #[ORM\OneToMany(targetEntity: jobs::class, mappedBy: 'jobCandidates')]
    private Collection $id_job;

    #[ORM\OneToMany(targetEntity: Candidates::class, mappedBy: 'jobCandidates')]
    private Collection $id_candidate;

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

    /**
     * @return Collection<int, jobs>
     */
    public function getIdJob(): Collection
    {
        return $this->id_job;
    }

    public function addIdJob(jobs $idJob): static
    {
        if (!$this->id_job->contains($idJob)) {
            $this->id_job->add($idJob);
            $idJob->setJobCandidates($this);
        }

        return $this;
    }

    public function removeIdJob(jobs $idJob): static
    {
        if ($this->id_job->removeElement($idJob)) {
            // set the owning side to null (unless already changed)
            if ($idJob->getJobCandidates() === $this) {
                $idJob->setJobCandidates(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidates>
     */
    public function getIdCandidate(): Collection
    {
        return $this->id_candidate;
    }

    public function addIdCandidate(Candidates $idCandidate): static
    {
        if (!$this->id_candidate->contains($idCandidate)) {
            $this->id_candidate->add($idCandidate);
            $idCandidate->setJobCandidates($this);
        }

        return $this;
    }

    public function removeIdCandidate(Candidates $idCandidate): static
    {
        if ($this->id_candidate->removeElement($idCandidate)) {
            // set the owning side to null (unless already changed)
            if ($idCandidate->getJobCandidates() === $this) {
                $idCandidate->setJobCandidates(null);
            }
        }

        return $this;
    }
}
