<?php

namespace App\Entity;

use App\Repository\DaysRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DaysRepository::class)]
class Days
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $half_day = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHalfDay(): ?string
    {
        return $this->half_day;
    }

    public function setHalfDay(string $half_day): self
    {
        $this->half_day = $half_day;

        return $this;
    }
}
