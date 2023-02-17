<?php

namespace App\Entity;

use App\Repository\SupplierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="supplier")
     */
    private $pro;

    public function __construct()
    {
        $this->pro = new ArrayCollection();
    }


    


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

    /**
     * @return Collection<int, Product>
     */
    public function getPro(): Collection
    {
        return $this->pro;
    }

    public function addPro(Product $pro): self
    {
        if (!$this->pro->contains($pro)) {
            $this->pro[] = $pro;
            $pro->setSupplier($this);
        }

        return $this;
    }

    public function removePro(Product $pro): self
    {
        if ($this->pro->removeElement($pro)) {
            // set the owning side to null (unless already changed)
            if ($pro->getSupplier() === $this) {
                $pro->setSupplier(null);
            }
        }

        return $this;
    }

   
}
