<?php

namespace App\Entity;

use App\Repository\NotesCandidatesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotesCandidatesRepository::class)]
class NotesCandidates
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dt_note = null;

    #[ORM\OneToMany(targetEntity: Candidates::class, mappedBy: 'notesCandidates')]
    private Collection $id_candidates;

    #[ORM\OneToMany(targetEntity: Clients::class, mappedBy: 'notesCandidates')]
    private Collection $id_client;

    public function __construct()
    {
        $this->id_candidates = new ArrayCollection();
        $this->id_client = new ArrayCollection();
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
     * @return Collection<int, Candidates>
     */
    public function getIdCandidates(): Collection
    {
        return $this->id_candidates;
    }

    public function addIdCandidate(Candidates $idCandidate): static
    {
        if (!$this->id_candidates->contains($idCandidate)) {
            $this->id_candidates->add($idCandidate);
            $idCandidate->setNotesCandidates($this);
        }

        return $this;
    }

    public function removeIdCandidate(Candidates $idCandidate): static
    {
        if ($this->id_candidates->removeElement($idCandidate)) {
            // set the owning side to null (unless already changed)
            if ($idCandidate->getNotesCandidates() === $this) {
                $idCandidate->setNotesCandidates(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Clients>
     */
    public function getIdClient(): Collection
    {
        return $this->id_client;
    }

    public function addIdClient(Clients $idClient): static
    {
        if (!$this->id_client->contains($idClient)) {
            $this->id_client->add($idClient);
            $idClient->setNotesCandidates($this);
        }

        return $this;
    }

    public function removeIdClient(Clients $idClient): static
    {
        if ($this->id_client->removeElement($idClient)) {
            // set the owning side to null (unless already changed)
            if ($idClient->getNotesCandidates() === $this) {
                $idClient->setNotesCandidates(null);
            }
        }

        return $this;
    }
}
