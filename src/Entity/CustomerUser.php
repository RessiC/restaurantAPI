<?php

namespace App\Entity;

use App\Repository\CustomerUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerUserRepository::class)
 * @ORM\Table(name="customer_user")
 */
class CustomerUser extends User
{
    const ROLE_CUSTOMER = ['ROLE_CUSTOMER'];

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="customerUser")
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setCustomerUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getCustomerUser() === $this) {
                $order->setCustomerUser(null);
            }
        }

        return $this;
    }

}
