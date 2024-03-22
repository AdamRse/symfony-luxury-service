<?php

namespace App\Entity;

use App\Repository\JobsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobsRepository::class)]
class Jobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\Column(length: 4095)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column]
    private ?int $salary = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dt_closing = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dt_creation = null;

    #[ORM\OneToMany(targetEntity: typeJobs::class, mappedBy: 'jobs')]
    private Collection $type;

    #[ORM\OneToMany(targetEntity: Categories::class, mappedBy: 'jobs')]
    private Collection $categorie;

    #[ORM\ManyToOne(inversedBy: 'id_job')]
    private ?JobCandidates $jobCandidates = null;

    #[ORM\ManyToOne(inversedBy: 'id_job')]
    private ?NotesJobs $notesJobs = null;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): static
    {
        $this->salary = $salary;

        return $this;
    }

    public function getDtClosing(): ?\DateTimeInterface
    {
        return $this->dt_closing;
    }

    public function setDtClosing(\DateTimeInterface $dt_closing): static
    {
        $this->dt_closing = $dt_closing;

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
     * @return Collection<int, typeJobs>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(typeJobs $type): static
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
            $type->setJobs($this);
        }

        return $this;
    }

    public function removeType(typeJobs $type): static
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getJobs() === $this) {
                $type->setJobs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categories $categorie): static
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
            $categorie->setJobs($this);
        }

        return $this;
    }

    public function removeCategorie(Categories $categorie): static
    {
        if ($this->categorie->removeElement($categorie)) {
            // set the owning side to null (unless already changed)
            if ($categorie->getJobs() === $this) {
                $categorie->setJobs(null);
            }
        }

        return $this;
    }

    public function getJobCandidates(): ?JobCandidates
    {
        return $this->jobCandidates;
    }

    public function setJobCandidates(?JobCandidates $jobCandidates): static
    {
        $this->jobCandidates = $jobCandidates;

        return $this;
    }

    public function getNotesJobs(): ?NotesJobs
    {
        return $this->notesJobs;
    }

    public function setNotesJobs(?NotesJobs $notesJobs): static
    {
        $this->notesJobs = $notesJobs;

        return $this;
    }
}
