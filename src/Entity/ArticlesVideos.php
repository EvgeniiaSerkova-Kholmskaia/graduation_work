<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticlesVideos
 *
 * @ORM\Table(name="articles_videos", indexes={@ORM\Index(name="fk_articles_videos_articles1_idx", columns={"articles_id", "articles_categories_url"}), @ORM\Index(name="IDX_9392B01F45A4DCA21EBAF6CC", columns={"articles_categories_url", "articles_id"})})
 * @ORM\Entity
 */
class ArticlesVideos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alt", type="string", length=200, nullable=true)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="main", type="text", length=255, nullable=false)
     */
    private $main;

    /**
     * @var \Articles
     *
     * @ORM\ManyToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="articles_categories_url", referencedColumnName="categories_url"),
     *   @ORM\JoinColumn(name="articles_id", referencedColumnName="id")
     * })
     */
    private $articlesCategoriesUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getMain(): ?string
    {
        return $this->main;
    }

    public function setMain(string $main): self
    {
        $this->main = $main;

        return $this;
    }

    public function getArticlesCategoriesUrl(): ?Articles
    {
        return $this->articlesCategoriesUrl;
    }

    public function setArticlesCategoriesUrl(?Articles $articlesCategoriesUrl): self
    {
        $this->articlesCategoriesUrl = $articlesCategoriesUrl;

        return $this;
    }


}
