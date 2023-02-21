<?php

namespace App\Entity;

use App\Repository\SupplierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplierRepository::class)
 */
class Supplier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namesup;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namesupp;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNamesup(): ?string
    {
        return $this->namesup;
    }

    public function setNamesup(string $namesup): self
    {
        $this->namesup = $namesup;

        return $this;
    }

    public function getNamesupp(): ?string
    {
        return $this->namesupp;
    }

    public function setNamesupp(string $namesupp): self
    {
        $this->namesupp = $namesupp;

        return $this;
    }
}
