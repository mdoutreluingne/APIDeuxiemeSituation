<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *        itemOperations={
 *          "get",
 *          "put",
 *          "modifConfiguration"={
 *              "method"="PUT",
 *              "path"="/configuration/modifConfiguration",
 *              "defaults"={"_api_receive"=false},
 *              "controller"=App\Controller\ModifAvis::class,
 *              "openapi_context"={
 *                  "operationId"="modifclient",
 *                   "requestBody" = {
 *                     "content": {
 *                         "application/json": {
 *                             "schema": {
 *                                 "type": "object",
 *                                 "properties": {
 *                                     "nbcommentaire": {"type": "int", "example": "3"},
 *                                     "nbavis": {"type": "int", "example": "3"},
 *                                     "notemini": {"type": "float", "example": "3.4"}
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
 *    },
 *    collectionOperations={
 *      "get",
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ConfigurationRepository")
 */
class Configuration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_commentaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_avis;

    /**
     * @ORM\Column(type="float")
     */
    private $note_min;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbCommentaire(): ?int
    {
        return $this->nb_commentaire;
    }

    public function setNbCommentaire(int $nb_commentaire): self
    {
        $this->nb_commentaire = $nb_commentaire;

        return $this;
    }

    public function getNbAvis(): ?int
    {
        return $this->nb_avis;
    }

    public function setNbAvis(int $nb_avis): self
    {
        $this->nb_avis = $nb_avis;

        return $this;
    }

    public function getNoteMin(): ?float
    {
        return $this->note_min;
    }

    public function setNoteMin(float $note_min): self
    {
        $this->note_min = $note_min;

        return $this;
    }
}
