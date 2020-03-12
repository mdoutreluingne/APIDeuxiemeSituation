<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *      collectionOperations={
 *          "get",
 *          "addUtilisateur"={
 *              "method"="POST",
 *              "path"="/utilisateur/addUtilisateur/{login}/{mdp}/{role}/{client}",
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
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\Column(type="string", length=30)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Client", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
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
