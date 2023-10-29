<?php

namespace App\Entity;

use App\Repository\StaffRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


#[ORM\Entity(repositoryClass: StaffRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Un employé est déja relié à cette email')]
class Staff implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\ManyToOne(inversedBy: 'staff')]
    private ?Admin $admin = null;

    #[ORM\OneToMany(mappedBy: 'staff', targetEntity: VehicleListing::class)]
    private Collection $vehicleListing;

    #[ORM\OneToMany(mappedBy: 'staff', targetEntity: AddComment::class)]
    private Collection $addComments;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    public function __construct()
    {
        $this->vehicleListing = new ArrayCollection();
        $this->addComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): static
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return Collection<int, VehicleListing>
     */
    public function getVehicleListing(): Collection
    {
        return $this->vehicleListing;
    }

    public function addVehicleListing(VehicleListing $vehicleListing): static
    {
        if (!$this->vehicleListing->contains($vehicleListing)) {
            $this->vehicleListing->add($vehicleListing);
            $vehicleListing->setStaff($this);
        }

        return $this;
    }

    public function removeVehicleListing(VehicleListing $vehicleListing): static
    {
        if ($this->vehicleListing->removeElement($vehicleListing)) {
            // set the owning side to null (unless already changed)
            if ($vehicleListing->getStaff() === $this) {
                $vehicleListing->setStaff(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AddComment>
     */
    public function getAddComments(): Collection
    {
        return $this->addComments;
    }

    public function addAddComment(AddComment $addComment): static
    {
        if (!$this->addComments->contains($addComment)) {
            $this->addComments->add($addComment);
            $addComment->setStaff($this);
        }

        return $this;
    }

    public function removeAddComment(AddComment $addComment): static
    {
        if ($this->addComments->removeElement($addComment)) {
            // set the owning side to null (unless already changed)
            if ($addComment->getStaff() === $this) {
                $addComment->setStaff(null);
            }
        }

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

}
