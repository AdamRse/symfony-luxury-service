<?php

namespace App\Entity;

use App\Repository\CandidatesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatesRepository::class)]
class Candidates
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $f_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $l_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?bool $available = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dt_inscription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(nullable: true)]
    private ?bool $has_passport = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column(length: 4095, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?bool $gender = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dt_updated = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dt_deleted = null;

    #[ORM\ManyToOne(inversedBy: 'id_candidate')]
    private ?JobCandidates $jobCandidates = null;

    #[ORM\ManyToOne(inversedBy: 'id_candidates')]
    private ?NotesCandidates $notesCandidates = null;

    #[ORM\ManyToOne(inversedBy: 'id_candidate')]
    private ?NotesJobs $notesJobs = null;

    #[ORM\OneToMany(targetEntity: Activity::class, mappedBy: 'candidates')]
    private Collection $activity;

    #[ORM\OneToMany(targetEntity: Nationalities::class, mappedBy: 'candidates')]
    private Collection $nationality;

    #[ORM\OneToMany(targetEntity: Experiences::class, mappedBy: 'candidates')]
    private Collection $experience;

    #[ORM\OneToOne(mappedBy: 'candidate', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->activity = new ArrayCollection();
        $this->nationality = new ArrayCollection();
        $this->experience = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFName(): ?string
    {
        return $this->f_name;
    }

    public function setFName(?string $f_name): static
    {
        $this->f_name = $f_name;

        return $this;
    }

    public function getLName(): ?string
    {
        return $this->l_name;
    }

    public function setLName(?string $l_name): static
    {
        $this->l_name = $l_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(?bool $available): static
    {
        $this->available = $available;

        return $this;
    }

    public function getDtInscription(): ?\DateTimeInterface
    {
        return $this->dt_inscription;
    }

    public function setDtInscription(?\DateTimeInterface $dt_inscription): static
    {
        $this->dt_inscription = $dt_inscription;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function isHasPassport(): ?bool
    {
        return $this->has_passport;
    }

    public function setHasPassport(?bool $has_passport): static
    {
        $this->has_passport = $has_passport;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(?bool $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getDtUpdated(): ?\DateTimeInterface
    {
        return $this->dt_updated;
    }

    public function setDtUpdated(?\DateTimeInterface $dt_updated): static
    {
        $this->dt_updated = $dt_updated;

        return $this;
    }

    public function getDtDeleted(): ?\DateTimeInterface
    {
        return $this->dt_deleted;
    }

    public function setDtDeleted(?\DateTimeInterface $dt_deleted): static
    {
        $this->dt_deleted = $dt_deleted;

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

    public function getNotesCandidates(): ?NotesCandidates
    {
        return $this->notesCandidates;
    }

    public function setNotesCandidates(?NotesCandidates $notesCandidates): static
    {
        $this->notesCandidates = $notesCandidates;

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

    /**
     * @return Collection<int, Activity>
     */
    public function getActivity(): Collection
    {
        return $this->activity;
    }

    public function addActivity(Activity $activity): static
    {
        if (!$this->activity->contains($activity)) {
            $this->activity->add($activity);
            $activity->setCandidates($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): static
    {
        if ($this->activity->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getCandidates() === $this) {
                $activity->setCandidates(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Nationalities>
     */
    public function getNationality(): Collection
    {
        return $this->nationality;
    }

    public function addNationality(Nationalities $nationality): static
    {
        if (!$this->nationality->contains($nationality)) {
            $this->nationality->add($nationality);
            $nationality->setCandidates($this);
        }

        return $this;
    }

    public function removeNationality(Nationalities $nationality): static
    {
        if ($this->nationality->removeElement($nationality)) {
            // set the owning side to null (unless already changed)
            if ($nationality->getCandidates() === $this) {
                $nationality->setCandidates(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Experiences>
     */
    public function getExperience(): Collection
    {
        return $this->experience;
    }

    public function addExperience(Experiences $experience): static
    {
        if (!$this->experience->contains($experience)) {
            $this->experience->add($experience);
            $experience->setCandidates($this);
        }

        return $this;
    }

    public function removeExperience(Experiences $experience): static
    {
        if ($this->experience->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCandidates() === $this) {
                $experience->setCandidates(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setCandidate(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getCandidate() !== $this) {
            $user->setCandidate($this);
        }

        $this->user = $user;

        return $this;
    }
}
