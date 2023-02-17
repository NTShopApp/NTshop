<?php

namespace App\Entity;

use App\Repository\ProsupRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProsupRepository::class)
 */
class Prosup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Product::class, cascade={"persist", "remove"})
     */
    private $pro;

    /**
     * @ORM\ManyToOne(targetEntity=Supplier::class)
     */
    private $sup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPro(): ?Product
    {
        return $this->pro;
    }

    public function setPro(?Product $pro): self
    {
        $this->pro = $pro;

        return $this;
    }

    public function getSup(): ?Supplier
    {
        return $this->sup;
    }

    public function setSup(?Supplier $sup): self
    {
        $this->sup = $sup;

        return $this;
    }
}
