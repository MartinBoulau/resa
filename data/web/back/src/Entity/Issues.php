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
    private ?Vehicules $id_vehicule = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reservations $id_reservation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $issue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVehicule(): ?Vehicules
    {
        return $this->id_vehicule;
    }

    public function setIdVehicule(?Vehicules $id_vehicule): self
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    public function getIdReservation(): ?Reservations
    {
        return $this->id_reservation;
    }

    public function setIdReservation(?Reservations $id_reservation): self
    {
        $this->id_reservation = $id_reservation;

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
