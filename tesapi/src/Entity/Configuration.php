<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      *     itemOperations={
 *          "put",
 *          "changeNbAvis"={
 *          "method"="PUT",
 *          "path"="/configuration/changeNbAvis/{nombre}",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\ModifNbAvis::class,
 *          "openapi_context"={
 *              "operationId"="modifNbAvis",
 *              "parameters"={
 *                  {
 *                      "name"="nombre",
 *                      "required"=true,
 *                      "type"="int",
 *                      "in"="path",
 *                      "description"="le nombre d'avis affiché aléatoirement"
 *                  }
 *              },
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      }
 *    }
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
