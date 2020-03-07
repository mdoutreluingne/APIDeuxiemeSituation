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
 *          "path"="/transaction/addTransaction/{date}/{montant}/{type}/{numero}/{commentaire}/{reservation}/{client}",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\AjoutTransaction::class,
 *          "openapi_context"={
 *               "operationId"="postTransaction",
 *               "parameters"={
 *                  {
 *                      "name"="date",
 *                      "required"=true,
 *                      "type"="date",
 *                      "in"="path",
 *                      "description"="Date de la transaction"
 *                  },
 *                  {
 *                      "name"="montant",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Montant de la transaction"
 *                  },
 *                  {
 *                      "name"="type",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Type de la transaction"
 *                  },
 *                  {
 *                      "name"="numero",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Numéro de la transaction"
 *                  },
 *                  {
 *                      "name"="commentaire",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Commentaire de la transaction"
 *                  },
 *                   {
 *                      "name"="reservation",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Réservation de la transaction"
 *                  },
 *                  {
 *                      "name"="client",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="Client de la transaction"
 *                  }
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
