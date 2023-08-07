<?php

namespace App\Entity;

use App\Repository\TinyKangarooRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TinyKangarooRepository::class)]
class TinyKangaroo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $name = null;

    private $userdata;
    private $userpass;
    #[Assert\Url]
    private $website;

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUserData(): ?string
    {
        return $this->userdata;
    }
    public function getUserPass(): ?string
    {
        return $this->userpass;
    }

    public function setUserData(?string $userdata): self
    {
        $this->userdata = $userdata;

        return $this;
    }
}
