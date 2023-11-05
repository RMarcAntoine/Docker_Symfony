<?php

namespace App\Entity;

use App\Repository\ReviewsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewsRepository::class)]
class Reviews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Game = null;

    #[ORM\Column(type: "float")]
    private ?float $Rate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Text = null;

    #[ORM\Column(length: 255)]
    private ?string $Imagefile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGame(): ?string
    {
        return $this->Game;
    }

    public function setGame(string $Game): static
    {
        $this->Game = $Game;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->Rate;
    }

    public function setRate(float $Rate): static
    {
        $this->Rate = $Rate;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(string $text): static
    {
        $this->Text = $text;

        return $this;
    }

    public function getImagefile(): ?string
    {
        return $this->Imagefile;
    }

    public function setImagefile(string $Imagefile): static
    {
        $this->Imagefile = $Imagefile;

        return $this;
    }
}
