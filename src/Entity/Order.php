<?php

namespace App\Entity;

use App\Entity\User\User;
use App\Repository\OrderRepository;
use App\Entity\Restaurant\Item;
use App\Entity\Restaurant\Restaurant;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * using nullable true for testing, we bill false
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $orderAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $readyAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $paidAt;

    /**
     * using nullable true for testing, we bill false
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;



    /**
     * @ORM\ManyToMany(targetEntity=Item::class, inversedBy="orders")
     * @ORM\JoinTable(name="order_item")
     */
    private $items;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="orders")
     */
    private $restaurant;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
     */
    private $user;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderAt(): ?\DateTimeInterface
    {
        return $this->orderAt;
    }

    public function setOrderAt(\DateTimeInterface $orderAt): self
    {
        $this->orderAt = $orderAt;

        return $this;
    }

    public function getReadyAt(): ?\DateTimeInterface
    {
        return $this->readyAt;
    }

    public function setReadyAt(?\DateTimeInterface $readyAt): self
    {
        $this->readyAt = $readyAt;

        return $this;
    }

    public function getPaidAt(): ?\DateTimeInterface
    {
        return $this->paidAt;
    }

    public function setPaidAt(\DateTimeInterface $paidAt): self
    {
        $this->paidAt = $paidAt;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        $this->items->removeElement($item);

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
