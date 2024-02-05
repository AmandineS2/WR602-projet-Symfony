<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: subscription::class)]
    private Collection $subscription_id;

    #[ORM\ManyToOne(inversedBy: 'user_id')]
    private ?Pdf $pdf_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $subscription_end_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updated_at = null;

    public function __construct()
    {
        $this->subscription_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, subscription>
     */
    public function getSubscriptionId(): Collection
    {
        return $this->subscription_id;
    }

    public function addSubscriptionId(subscription $subscriptionId): static
    {
        if (!$this->subscription_id->contains($subscriptionId)) {
            $this->subscription_id->add($subscriptionId);
            $subscriptionId->setUserId($this);
        }

        return $this;
    }

    public function removeSubscriptionId(subscription $subscriptionId): static
    {
        if ($this->subscription_id->removeElement($subscriptionId)) {
            // set the owning side to null (unless already changed)
            if ($subscriptionId->getUserId() === $this) {
                $subscriptionId->setUserId(null);
            }
        }

        return $this;
    }

    public function getPdfId(): ?Pdf
    {
        return $this->pdf_id;
    }

    public function setPdfId(?Pdf $pdf_id): static
    {
        $this->pdf_id = $pdf_id;

        return $this;
    }

    public function getSubscriptionEndAt(): ?\DateTimeInterface
    {
        return $this->subscription_end_at;
    }

    public function setSubscriptionEndAt(\DateTimeInterface $subscription_end_at): static
    {
        $this->subscription_end_at = $subscription_end_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
