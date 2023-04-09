<?php

namespace App\Entity;

use App\Repository\IssuesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IssuesRepository::class)]
class Issues
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicules $vehicule = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reservations $reservation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $issue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?Vehicules
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicules $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getReservation(): ?Reservations
    {
        return $this->reservation;
    }

    public function setReservation(?Reservations $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getIssue(): ?string
    {
        return $this->issue;
    }

    public function setIssue(string $issue): self
    {
        $this->issue = $issue;

        return $this;
    }
}
