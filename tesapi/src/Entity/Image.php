<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *    attributes={"pagination_enabled"=false},
 *    collectionOperations={
 *      "get",
 *      "getImagesSalle"={
 *          "method"="GET",
 *          "path"="/images/getImagesSalle",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\RecupImagesSalle::class,
 *          "openapi_context"={
 *              "operationId"="getImagesSalle",
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *       },
 *      "countPhotos"={
 *              "method"="GET",
 *              "path"="/images/countPhotos",
 *              "defaults"={"_api_receive"=false},
 *              "controller"=App\Controller\RecupCountPhotos::class,
 *             "openapi_context"={
 *                  "operationId"="getcountPhotos",
 *                  "produces"={
 *                      "application/json"
 *                  }
 *              }
 *        }
 *    }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle")
     * @ORM\JoinColumn(nullable=true)
     */
    private $salle;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Theme", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $theme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partie")
     * @ORM\JoinColumn(name="partie_id", referencedColumnName="reservation", nullable=true)
     */
    private $partie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=true)
     */
    private $article;

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

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getPartie(): ?Partie
    {
        return $this->partie;
    }

    public function setPartie(?Partie $partie): self
    {
        $this->partie = $partie;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
