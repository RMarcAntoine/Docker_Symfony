<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Eamil = null;

    #[ORM\Column(length: 255)]
    private ?string $Subject = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getEamil(): ?string
    {
        return $this->Eamil;
    }

    public function setEamil(string $Eamil): static
    {
        $this->Eamil = $Eamil;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->Subject;
    }

    public function setSubject(string $Subject): static
    {
        $this->Subject = $Subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }
}
