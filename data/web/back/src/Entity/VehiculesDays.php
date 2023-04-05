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
    private ?Days $day = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicules $vehicule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?Days
    {
        return $this->day;
    }

    public function setDay(?Days $day): self
    {
        $this->day = $day;

        return $this;
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
}
