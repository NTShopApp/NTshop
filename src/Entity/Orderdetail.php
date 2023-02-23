<?php

namespace App\Entity;

use App\Repository\OrderdetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderdetailRepository::class)
 */
class Orderdetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="oid")
     */
    private $oid;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="pid")
     */
    private $pid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getOid(): ?Order
    {
        return $this->oid;
    }

    public function setOid(?Order $oid): self
    {
        $this->oid = $oid;

        return $this;
    }

    public function getPid(): ?Product
    {
        return $this->pid;
    }

    public function setPid(?Product $pid): self
    {
        $this->pid = $pid;

        return $this;
    }
}
