<?php

namespace App\Entity;

use App\Repository\SuggestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuggestRepository::class)]
class Suggest
{
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO'), ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    private string $url;

    #[ORM\Column(type: 'string', length: 255)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $instagram = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $youtube;

    #[ORM\Column]
    private string $createdAt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $twitter;

    #[ORM\Column(type: 'integer')]
    private int $votes;

    public function __construct()
    {
        $this->createdAt = date_format(new \DateTimeImmutable(), 'Y-W');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }


    public function getVotes(): int
    {
        return $this->votes;
    }

    public function setVotes(int $votes): void
    {
        $this->votes = $votes;
    }


}
