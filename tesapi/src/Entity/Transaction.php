<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     collectionOperations={
 *      "get",
 *      "byIdClient"={
 *          "method"="GET",
 *          "path"="/transaction/byIdClient/{id}",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\RecupByIdClient::class,
 *          "openapi_context"={
 *              "operationId"="byIdClient",
 *              "parameters"={
 *                  {
 *                      "name"="id",
 *                      "required"=true,
 *                      "type"="int",
 *                      "in"="path",
 *                      "description"="id du client"
 *                  }
 *              },
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      },
 *      "addTransaction"={
 *          "method"="POST",
 *          "path"="/transaction/addTransaction",
 *          "read"=false,
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\AjoutTransaction::class,
 *          "openapi_context"={
 *               "operationId"="postTransaction",
 *               "requestBody" = {
 *                     "content": {
 *                         "application/json": {
 *                             "schema": {
 *                                 "type": "object",
 *                                 "properties": {
 *                                     "date": {"type": "date", "example": "2020-07-15"},
 *                                     "montant": {"type": "string", "example": "10"},
 *                                     "type": {"type": "string", "example": "Carte Bancaire"},
 *                                     "numero": {"type": "string", "example": " "},
 *                                     "commentaire": {"type": "string", "example": "Transaction de test"},
 *                                     "reservation": {"type": "string", "example": " "},
 *                                     "client": {"type": "string", "example": "1"}
 *                                 },
 *                               }
 *                          }
 *                      }
 *                  },
 *              "parameters"={
 *              },
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *        }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservation", cascade={"persist", "remove"})
     */
    private $reservation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
