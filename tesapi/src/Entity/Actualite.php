<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      collectionOperations={
 *      "get",
 *      "post",
 *      "addActualite"={
 *          "method"="POST",
 *          "path"="/actualites/addActualite",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\AjoutActualite::class,
 *          "openapi_context"={
 *                  "operationId"="addactualite",
 *                   "requestBody" = {
 *                     "content": {
 *                         "application/json": {
 *                             "schema": {
 *                                 "type": "object",
 *                                 "properties": {
 *                                     "titre": {"type": "string", "example": "test"},
 *                                     "paragraphe": {"type": "string", "example": "test"},
 *                                     "image": {"type": "string", "example": "test.png"},
 *                                     "datedebut": {"type": "datetime", "example": "2020-05-22 12:00:00"},
 *                                     "datefin": {"type": "datetime", "example": "2020-05-23 12:00:00"}
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
 *             }
 *      },
 *     "countActualite"={
 *          "method"="GET",
 *          "path"="/actualites/countActualite",
 *          "defaults"={"_api_receive"=true},
 *          "controller"=App\Controller\RecupCountActualite::class,
 *          "openapi_context"={
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      }
 *    }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ActualiteRepository")
 */
class Actualite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $paragraphe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getParagraphe(): ?string
    {
        return $this->paragraphe;
    }

    public function setParagraphe(?string $paragraphe): self
    {
        $this->paragraphe = $paragraphe;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
