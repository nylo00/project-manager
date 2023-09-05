<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $created_ad = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_ad = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bearbeiter = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAd(): ?\DateTimeInterface
    {
        return $this->created_ad;
    }

    public function setCreatedAd(?\DateTimeInterface $created_ad): static
    {
        $this->created_ad = $created_ad;

        return $this;
    }

    public function getUpdatedAd(): ?\DateTimeInterface
    {
        return $this->updated_ad;
    }

    public function setUpdatedAd(?\DateTimeInterface $updated_ad): static
    {
        $this->updated_ad = $updated_ad;

        return $this;
    }

    public function getBearbeiter(): ?string
    {
        return $this->bearbeiter;
    }

    public function setBearbeiter(?string $bearbeiter): static
    {
        $this->bearbeiter = $bearbeiter;

        return $this;
    }
}
