<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     collectionOperations={
 *      "get",
 *      "byTheme"={
 *          "method"="GET",
 *          "path"="/avis/byTheme/{theme}",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\RecupAvisByTheme::class,
 *          "openapi_context"={
 *              "operationId"="getByTheme",
 *              "parameters"={
 *                  {
 *                      "name"="theme",
 *                      "required"=true,
 *                      "type"="string",
 *                      "in"="path",
 *                      "description"="nom du theme de la salle"
 *                  }
 *              },
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      },
 *     "byTauxSatisfaction"={
 *          "method"="GET",
 *          "path"="/avis/byTauxSatisfaction/{theme}",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\RecupTauxSatisfactionByTheme::class,
 *          "openapi_context"={
 *              "operationId"="getByTheme",
 *              "parameters"={
 *                  {
 *                      "name"="theme",
 *                      "required"=true,
 *                      "type"="string",
 *                      "in"="path",
 *                      "description"="nom du theme de la salle"
 *                  }
 *              },
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      }
 *   }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $note;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
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

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

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
