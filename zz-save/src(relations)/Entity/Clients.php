<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $contact = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\OneToMany(targetEntity: Postes::class, mappedBy: 'clients')]
    private Collection $poste;

    #[ORM\ManyToOne(inversedBy: 'id_client')]
    private ?NotesCandidates $notesCandidates = null;

    public function __construct()
    {
        $this->poste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, Postes>
     */
    public function getPoste(): Collection
    {
        return $this->poste;
    }

    public function addPoste(Postes $poste): static
    {
        if (!$this->poste->contains($poste)) {
            $this->poste->add($poste);
            $poste->setClients($this);
        }

        return $this;
    }

    public function removePoste(Postes $poste): static
    {
        if ($this->poste->removeElement($poste)) {
            // set the owning side to null (unless already changed)
            if ($poste->getClients() === $this) {
                $poste->setClients(null);
            }
        }

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
}
