<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *      collectionOperations={
 *          "get",
 *          "soldeById"={
 *              "method"="GET",
 *              "path"="/client/soldeById/{id}",
 *              "defaults"={"_api_receive"=false},
 *              "controller"=App\Controller\SoldeById::class,
 *              "openapi_context"={
 *                  "operationId"="soldeById",
 *                  "parameters"={
 *                      {
 *                          "name"="id",
 *                          "required"=true,
 *                          "type"="int",
 *                          "in"="path",
 *                          "description"="id du client"
 *                      }
 *                  },
 *                  "produces"={
 *                      "application/json"
 *                  }
 *              }
 *          },
 *          "addClient"={
 *              "method"="POST",
 *              "path"="/clients/addClient",
 *              "defaults"={"_api_receive"=false},
 *              "read"=false,
 *              "controller"=App\Controller\AjoutClient::class,
 *              "openapi_context"={
 *                  "operationId"="addClient",
 *                   "requestBody" = {
 *                     "content": {
 *                         "application/json": {
 *                             "schema": {
 *                                 "type": "object",
 *                                 "properties": {
 *                                     "nom": {"type": "string", "example": "Giorno"},
 *                                     "prenom": {"type": "string", "example": "Bernardo"},
 *                                     "ville": {"type": "string", "example": "Annecy"},
 *                                     "tel": {"type": "string", "example": "0783664072"},
 *                                     "mail": {"type": "string", "example": "email@example.com"},
 *                                     "archive": {"type": "string", "example": "0"}
 *                                 },
 *                               }
 *                          }
 *                      }
 *                  },
 *                  "parameters" =
 *                  {
 *                  },
 *                  "produces"={
 *                      "application/json"
 *                  }
 *              }
 *          }
 *     },
 *     itemOperations={
 *          "get",
 *          "delete",
 *          "modifClient"={
 *              "method"="PUT",
 *              "path"="/clients/modifclient",
 *              "defaults"={"_api_receive"=false},
 *              "read"=false,
 *              "controller"=App\Controller\ModifClient::class,
 *              "openapi_context"={
 *                  "operationId"="modifclient",
 *                   "requestBody" = {
 *                     "content": {
 *                         "application/json": {
 *                             "schema": {
 *                                 "type": "object",
 *                                 "properties": {
 *                                     "id": {"type": "int", "example": "3"},
 *                                     "nom": {"type": "string", "example": "Giorno"},
 *                                     "prenom": {"type": "string", "example": "Bernardo"},
 *                                     "ville": {"type": "string", "example": "Annecy"},
 *                                     "tel": {"type": "string", "example": "0783664072"},
 *                                     "mail": {"type": "string", "example": "email@example.com"},
 *                                     "archive": {"type": "string", "example": "0"}
 *                                 },
 *                               }
 *                          }
 *                      }
 *                  },
 *                  "parameters" =
 *                  {
 *                  },
 *                  "produces"={
 *                      "application/json"
 *                  }
 *              }
 *          }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $archive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }
}
