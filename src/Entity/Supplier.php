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
    private $idsup;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namesup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdsup(): ?string
    {
        return $this->idsup;
    }

    public function setIdsup(string $idsup): self
    {
        $this->idsup = $idsup;

        return $this;
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
}
