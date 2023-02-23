<?php

namespace App\Entity;

use App\Repository\OrderRepository;
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
     * @ORM\Column(type="float")
     */
    private $Total;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orderpro")
     */
    private $userorder;

    /**
     * @ORM\OneToMany(targetEntity=Orderdetail::class, mappedBy="oid")
     */
    private $oid;

    public function __construct()
    {
        $this->oid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotal(): ?float
    {
        return $this->Total;
    }

    public function setTotal(float $Total): self
    {
        $this->Total = $Total;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getUserorder(): ?User
    {
        return $this->userorder;
    }

    public function setUserorder(?User $userorder): self
    {
        $this->userorder = $userorder;

        return $this;
    }

    /**
     * @return Collection<int, Orderdetail>
     */
    public function getOid(): Collection
    {
        return $this->oid;
    }

    public function addOid(Orderdetail $oid): self
    {
        if (!$this->oid->contains($oid)) {
            $this->oid[] = $oid;
            $oid->setOid($this);
        }

        return $this;
    }

    public function removeOid(Orderdetail $oid): self
    {
        if ($this->oid->removeElement($oid)) {
            // set the owning side to null (unless already changed)
            if ($oid->getOid() === $this) {
                $oid->setOid(null);
            }
        }

        return $this;
    }
}
