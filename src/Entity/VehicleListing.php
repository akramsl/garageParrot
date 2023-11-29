<?php

namespace App\Entity;

use App\Repository\VehicleListingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleListingRepository::class)]
class VehicleListing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column]
    private ?int $mileage = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $pictures = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'vehicleListing')]
    private ?Staff $staff = null;

    #[ORM\OneToMany(mappedBy: 'vehicleListing', targetEntity: VehicleContact::class)]
    private Collection $vehicleContacts;

    #[ORM\OneToMany(mappedBy: 'vehicle', targetEntity: VehiclePicture::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $vehiclePictures;

    #[ORM\Column(length: 255)]
    private ?string $fuel = null;

    #[ORM\Column(length: 255)]
    private ?string $gearbox = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $power = null;

    #[ORM\Column]
    private ?int $horse_power = null;

    public function __construct()
    {
        $this->vehicleContacts = new ArrayCollection();
        $this->vehiclePictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPictures(): ?array
    {
        return $this->pictures;
    }

    public function setPictures(?array $pictures): static
    {
    if ($pictures !== null) {
        // Vérifiez si le tableau peut être encodé en JSON
        $json = json_encode($pictures);
        
        if ($json === false) {
            // Gérez l'erreur ou lancez une exception
            throw new \InvalidArgumentException('Les données ne peuvent pas être encodées en JSON.');
        }
    }

    $this->pictures = $pictures;

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

    public function getStaff(): ?Staff
    {
        return $this->staff;
    }

    public function setStaff(?Staff $staff): static
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * @return Collection<int, VehicleContact>
     */
    public function getVehicleContacts(): Collection
    {
        return $this->vehicleContacts;
    }

    public function addVehicleContact(VehicleContact $vehicleContact): static
    {
        if (!$this->vehicleContacts->contains($vehicleContact)) {
            $this->vehicleContacts->add($vehicleContact);
            $vehicleContact->setVehicleListing($this);
        }

        return $this;
    }

    public function removeVehicleContact(VehicleContact $vehicleContact): static
    {
        if ($this->vehicleContacts->removeElement($vehicleContact)) {
            // set the owning side to null (unless already changed)
            if ($vehicleContact->getVehicleListing() === $this) {
                $vehicleContact->setVehicleListing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VehiclePicture>
     */
    public function getVehiclePictures(): Collection
    {
        return $this->vehiclePictures;
    }

    public function addVehiclePicture(VehiclePicture $vehiclePicture): static
    {
        if (!$this->vehiclePictures->contains($vehiclePicture)) {
            $this->vehiclePictures->add($vehiclePicture);
            $vehiclePicture->setVehicle($this);
        }

        return $this;
    }

    public function removeVehiclePicture(VehiclePicture $vehiclePicture): static
    {
        if ($this->vehiclePictures->removeElement($vehiclePicture)) {
            // set the owning side to null (unless already changed)
            if ($vehiclePicture->getVehicle() === $this) {
                $vehiclePicture->setVehicle(null);
            }
        }

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): static
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(string $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getHorsePower(): ?int
    {
        return $this->horse_power;
    }

    public function setHorsePower(int $horse_power): static
    {
        $this->horse_power = $horse_power;

        return $this;
    }
}
