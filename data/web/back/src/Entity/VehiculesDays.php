<?php

namespace App\Entity;

use App\Repository\VehiculesDaysRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculesDaysRepository::class)]
class VehiculesDays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Days $id_day = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicules $id_vehicule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDay(): ?Days
    {
        return $this->id_day;
    }

    public function setIdDay(?Days $id_day): self
    {
        $this->id_day = $id_day;

        return $this;
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
}
