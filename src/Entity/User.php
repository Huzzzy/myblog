<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


  #[ORM\Entity(repositoryClass: "App\Repository\UserRepository")]
  #[ORM\Table(name: "user")]
 
class User implements UserInterface
{
    /**
     * @var int
     */
      #[ORM\Id()]
      #[ORM\GeneratedValue(strategy: "AUTO")]
      #[ORM\Column(type: "integer")]
     
    private ?int $id = null;

    /**
     * @var string
     */
     #[ORM\Column(type: "string", unique: true)]
     #[Assert\NotBlank()]
     #[Assert\Email()]
     
    private $email;

    /**
     * @var string
     */
     #[ORM\Column(type: "string")]
    
    private $password;

    /**
     * @var string
     */
     #[Assert\NotBlank()]
     
    private $plainPassword;

    /**
     * @var array
     */
    #[ORM\Column(type: "array")]
     
    private $roles = [];

    public function getRoles(): array
    {
        return [
            'ROLE_USER'
        ];
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     *
     * @return User
     */
    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }
}
