<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $idpro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namepro;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $infopro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Cart::class, mappedBy="proid")
     */
    private $proid;

    /**
     * @ORM\ManyToOne(targetEntity=Supplier::class, inversedBy="pro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $supplier;

    /**
     * @ORM\OneToMany(targetEntity=Orderdetail::class, mappedBy="pid")
     */
    private $pid;

    

    public function __construct()
    {
        $this->proid = new ArrayCollection();
        $this->pid = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdpro(): ?string
    {
        return $this->idpro;
    }

    public function setIdpro(string $idpro): self
    {
        $this->idpro = $idpro;

        return $this;
    }

    public function getNamepro(): ?string
    {
        return $this->namepro;
    }

    public function setNamepro(string $namepro): self
    {
        $this->namepro = $namepro;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getInfopro(): ?string
    {
        return $this->infopro;
    }

    public function setInfopro(string $infopro): self
    {
        $this->infopro = $infopro;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Cart>
     */
    public function getProid(): Collection
    {
        return $this->proid;
    }

    public function addProid(Cart $proid): self
    {
        if (!$this->proid->contains($proid)) {
            $this->proid[] = $proid;
            $proid->setProid($this);
        }

        return $this;
    }

    public function removeProid(Cart $proid): self
    {
        if ($this->proid->removeElement($proid)) {
            // set the owning side to null (unless already changed)
            if ($proid->getProid() === $this) {
                $proid->setProid(null);
            }
        }

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * @return Collection<int, Orderdetail>
     */
    public function getPid(): Collection
    {
        return $this->pid;
    }

    public function addPid(Orderdetail $pid): self
    {
        if (!$this->pid->contains($pid)) {
            $this->pid[] = $pid;
            $pid->setPid($this);
        }

        return $this;
    }

    public function removePid(Orderdetail $pid): self
    {
        if ($this->pid->removeElement($pid)) {
            // set the owning side to null (unless already changed)
            if ($pid->getPid() === $this) {
                $pid->setPid(null);
            }
        }

        return $this;
    }


}
