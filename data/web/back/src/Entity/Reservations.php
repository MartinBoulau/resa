<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
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
    private ?Persons $id_person = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Persons $id_person_resa = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_start = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_start_real = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_end = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_end_real = null;

    #[ORM\Column(nullable: true)]
    private ?float $km_end = null;

    #[ORM\Column]
    private ?int $nb_week = null;

    #[ORM\Column]
    private ?bool $cancel = false;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_cancel = null;

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

    public function getIdPerson(): ?Persons
    {
        return $this->id_person;
    }

    public function setIdPerson(?Persons $id_person): self
    {
        $this->id_person = $id_person;

        return $this;
    }

    public function getIdPersonResa(): ?Persons
    {
        return $this->id_person_resa;
    }

    public function setIdPersonResa(?Persons $id_person_resa): self
    {
        $this->id_person_resa = $id_person_resa;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateStartReal(): ?\DateTimeInterface
    {
        return $this->date_start_real;
    }

    public function setDateStartReal(?\DateTimeInterface $date_start_real): self
    {
        $this->date_start_real = $date_start_real;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getDateEndReal(): ?\DateTimeInterface
    {
        return $this->date_end_real;
    }

    public function setDateEndReal(?\DateTimeInterface $date_end_real): self
    {
        $this->date_end_real = $date_end_real;

        return $this;
    }

    public function getKmEnd(): ?float
    {
        return $this->km_end;
    }

    public function setKmEnd(?float $km_end): self
    {
        $this->km_end = $km_end;

        return $this;
    }

    public function getNbWeek(): ?int
    {
        return $this->nb_week;
    }

    public function setNbWeek(int $nb_week): self
    {
        $this->nb_week = $nb_week;

        return $this;
    }

    public function isCancel(): ?bool
    {
        return $this->cancel;
    }

    public function setCancel(bool $cancel): self
    {
        $this->cancel = $cancel;

        return $this;
    }

    public function getDateCancel(): ?\DateTimeInterface
    {
        return $this->date_cancel;
    }

    public function setDateCancel(?\DateTimeInterface $date_cancel): self
    {
        $this->date_cancel = $date_cancel;

        return $this;
    }
}
