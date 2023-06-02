<?php

namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsoleRepository::class)]
class Console
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $manufacturer = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $releaseDate = null;

    #[ORM\Column(length: 100)]
    private ?string $country = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $model = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $acquisitionPrice = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $acquisitionDate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $accessories = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $conservationAndCommentaries = null;

    #[ORM\ManyToOne(inversedBy: 'consoles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeImmutable
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeImmutable $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getAcquisitionPrice(): ?string
    {
        return $this->acquisitionPrice;
    }

    public function setAcquisitionPrice(?string $acquisitionPrice): self
    {
        $this->acquisitionPrice = $acquisitionPrice;

        return $this;
    }

    public function getAcquisitionDate(): ?\DateTimeImmutable
    {
        return $this->acquisitionDate;
    }

    public function setAcquisitionDate(?\DateTimeImmutable $acquisitionDate): self
    {
        $this->acquisitionDate = $acquisitionDate;

        return $this;
    }

    public function getAccessories(): ?string
    {
        return $this->accessories;
    }

    public function setAccessories(?string $accessories): self
    {
        $this->accessories = $accessories;

        return $this;
    }

    public function getConservationAndCommentaries(): ?string
    {
        return $this->conservationAndCommentaries;
    }

    public function setConservationAndCommentaries(?string $conservationAndCommentaries): self
    {
        $this->conservationAndCommentaries = $conservationAndCommentaries;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
