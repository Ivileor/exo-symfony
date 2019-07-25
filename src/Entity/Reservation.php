<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $trackDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bike", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bike;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrackDate(): ?\DateTimeInterface
    {
        return $this->trackDate;
    }

    public function setTrackDate(\DateTimeInterface $trackDate): self
    {
        $this->trackDate = $trackDate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getStatusTransKey(): ?string
    {
        $status = $this->getStatus();
        if ($status == 1){
            return 'reservation.status.ongoing.label';
        }
        elseif ($status == 2){
            return 'reservation.status.cancelled.label';
        }
        elseif ($status == 3){
            return 'reservation.status.confirmed.label';
        }
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBike(): ?Bike
    {
        return $this->bike;
    }

    public function setBike(?Bike $bike): self
    {
        $this->bike = $bike;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
