<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BikeOwnerRepository")
 */
class BikeOwner extends Person
{


    public function __toString(): ?string
    {
       return $this->getFirstName()." ".$this->getLastName();
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bike", mappedBy="bikeOwner", cascade={"persist", "remove"})
     */
    private $bike;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBike(): ?Bike
    {
        return $this->bike;
    }

    public function setBike(?Bike $bike): self
    {
        $this->bike = $bike;

        // set (or unset) the owning side of the relation if necessary
        $newBikeOwner = $bike === null ? null : $this;
        if ($newBikeOwner !== $bike->getBikeOwner()) {
            $bike->setBikeOwner($newBikeOwner);
        }

        return $this;
    }
}
