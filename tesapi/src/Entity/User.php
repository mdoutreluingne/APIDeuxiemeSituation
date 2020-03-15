<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *      collectionOperations={
 *          "get",
 *          "addUtilisateur"={
 *              "method"="POST",
 *              "path"="/users/addUtilisateur/{login}/{mdp}/{role}/{client}",
 *              "defaults"={"_api_receive"=false},
 *              "controller"=App\Controller\AjoutUtilisateur::class,
 *              "openapi_context"={
 *                  "operationId"="postUtilisateur",
 *                  "parameters"={
 *                      {
 *                          "name"="login",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Login du client"
 *                      },
 *                      {
 *                          "name"="mdp",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Mot de passe du client"
 *                      },
 *                      {
 *                          "name"="role",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Role de l'utilisateur"
 *                      },
 *                      {
 *                          "name"="client",
 *                          "required"=true,
 *                          "type"="int",
 *                          "in"="path",
 *                          "description"="Id du client"
 *                      }
 *                  },
 *                  "produces"={
 *                      "application/json"
 *                  }
 *              }
 *          }
 *     }
 * )
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true, name="login")
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", name="mdp")
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Client", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = "";

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
