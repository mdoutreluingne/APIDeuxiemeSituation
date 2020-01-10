<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      attributes={"pagination_enabled"=false},
 *      collectionOperations={
 *          "get",
 *          "villeByNom"={
 *              "method"="GET",
 *              "path"="/client/villeByNom/{nom}",
 *              "defaults"={"_api_receive"=false},
 *              "controller"=App\Controller\RecupVilleByNom::class,
 *              "openapi_context"={
 *                  "operationId"="villeByNom",
 *                  "parameters"={
 *                      {
 *                          "name"="nom",
 *                          "required"=true,
 *                          "type"="string",
 *                          "in"="path",
 *                          "description"="le nom de la ville"
 *                      }
 *                  },
 *                  "produces"={
 *                      "application/json"
 *                  }
 *              }
 *          }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

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
}
