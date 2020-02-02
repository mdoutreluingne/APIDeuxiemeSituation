<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     attributes={"pagination_enabled"=false},
 *    collectionOperations={
 *      "get",
 *      "lesThemes"={
 *          "method"="GET",
 *          "path"="/themes/lesThemes",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\RecupThemes::class,
 *          "openapi_context"={
 *              "operationId"="getlesThemes",
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      }
 *    }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class Theme
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
