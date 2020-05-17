<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *    attributes={"pagination_enabled"=false},
 *    collectionOperations={
 *      "get",
 *      "lesArticles"={
 *          "method"="GET",
 *          "path"="/articles/lesArticles",
 *          "defaults"={"_api_receive"=false},
 *          "controller"=App\Controller\RecupArticles::class,
 *          "openapi_context"={
 *              "operationId"="getArticles",
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      },
 *     "countArticles"={
 *          "method"="GET",
 *          "path"="/articles/countArticles",
 *          "defaults"={"_api_receive"=true},
 *          "controller"=App\Controller\RecupCountArticle::class,
 *          "openapi_context"={
 *              "operationId"="getCountArticles",
 *              "produces"={
 *                  "application/json"
 *              }
 *          }
 *      }
 *    },
 *    itemOperations={
 *          "put",
 *          "delete",
 *          "get"={
 *              "method"="GET",
 *              "path"="/article/get/{id}",
 *              "defaults"={"_api_receive"=false},
 *              "controller"=App\Controller\GetArticleById::class,
 *              "openapi_context"={
 *                  "operationId"="getArticleById",
 *                  "parameters"={
 *                     {
 *                          "name"="id",
 *                          "required"=true,
 *                          "type"="int",
 *                          "in"="path",
 *                          "description"="id de l'article"
 *                      }
 *                  },
 *                  "produces"={
 *                      "application/json"
 *                  }
 *              }
 *          }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
    private $libelle;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $montant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $archive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    public function getArticleSalle(): ?ArticleSalle
    {
        return $this->articleSalle;
    }

    public function setArticleSalle(?ArticleSalle $articleSalle): self
    {
        $this->articleSalle = $articleSalle;

        return $this;
    }
}
