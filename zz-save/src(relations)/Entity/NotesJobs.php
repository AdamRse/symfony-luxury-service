<?php

namespace App\Entity;

use App\Repository\NotesJobsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotesJobsRepository::class)]
class NotesJobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dt_note = null;

    #[ORM\OneToMany(targetEntity: Jobs::class, mappedBy: 'notesJobs')]
    private Collection $id_job;

    #[ORM\OneToMany(targetEntity: Candidates::class, mappedBy: 'notesJobs')]
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

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getDtNote(): ?\DateTimeInterface
    {
        return $this->dt_note;
    }

    public function setDtNote(\DateTimeInterface $dt_note): static
    {
        $this->dt_note = $dt_note;

        return $this;
    }

    /**
     * @return Collection<int, Jobs>
     */
    public function getIdJob(): Collection
    {
        return $this->id_job;
    }

    public function addIdJob(Jobs $idJob): static
    {
        if (!$this->id_job->contains($idJob)) {
            $this->id_job->add($idJob);
            $idJob->setNotesJobs($this);
        }

        return $this;
    }

    public function removeIdJob(Jobs $idJob): static
    {
        if ($this->id_job->removeElement($idJob)) {
            // set the owning side to null (unless already changed)
            if ($idJob->getNotesJobs() === $this) {
                $idJob->setNotesJobs(null);
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
            $idCandidate->setNotesJobs($this);
        }

        return $this;
    }

    public function removeIdCandidate(Candidates $idCandidate): static
    {
        if ($this->id_candidate->removeElement($idCandidate)) {
            // set the owning side to null (unless already changed)
            if ($idCandidate->getNotesJobs() === $this) {
                $idCandidate->setNotesJobs(null);
            }
        }

        return $this;
    }
}
