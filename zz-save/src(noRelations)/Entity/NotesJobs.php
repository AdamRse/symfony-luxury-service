<?php

namespace App\Entity;

use App\Repository\NotesJobsRepository;
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
}
