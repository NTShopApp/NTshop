<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

   

    /**
     * @ORM\Column(type="string", length=10)
      * @Assert\Length(
     *      min = 10,
     *      max = 11,
     *      minMessage = "Phone must be at least {{ limit }} characters long",
     *      maxMessage = "Phone cannot be longer than {{ limit }} characters"
     * )
     */
    private $Phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\OneToMany(targetEntity=Cart::class, mappedBy="usercart")
     */
    private $usercart;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="userorder")
     */
    private $orderpro;

    public function __construct()
    {
        $this->usercart = new ArrayCollection();
        $this->orderpro = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    /**
     * @return Collection<int, Cart>
     */
    public function getUsercart(): Collection
    {
        return $this->usercart;
    }

    public function addUsercart(Cart $usercart): self
    {
        if (!$this->usercart->contains($usercart)) {
            $this->usercart[] = $usercart;
            $usercart->setUsercart($this);
        }

        return $this;
    }

    public function removeUsercart(Cart $usercart): self
    {
        if ($this->usercart->removeElement($usercart)) {
            // set the owning side to null (unless already changed)
            if ($usercart->getUsercart() === $this) {
                $usercart->setUsercart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrderpro(): Collection
    {
        return $this->orderpro;
    }

    public function addOrderpro(Order $orderpro): self
    {
        if (!$this->orderpro->contains($orderpro)) {
            $this->orderpro[] = $orderpro;
            $orderpro->setUserorder($this);
        }

        return $this;
    }

    public function removeOrderpro(Order $orderpro): self
    {
        if ($this->orderpro->removeElement($orderpro)) {
            // set the owning side to null (unless already changed)
            if ($orderpro->getUserorder() === $this) {
                $orderpro->setUserorder(null);
            }
        }

        return $this;
    }
}
