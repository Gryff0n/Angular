<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $publisher = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $year = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $backcover = null;

    #[ORM\Column]
    private ?int $isbn = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): static
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getYear(): ?\DateTime
    {
        return $this->year;
    }

    public function setYear(\DateTime $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getBackcover(): ?string
    {
        return $this->backcover;
    }

    public function setBackcover(string $backcover): static
    {
        $this->backcover = $backcover;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }
}
