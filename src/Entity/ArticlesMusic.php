<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticlesMusic
 *
 * @ORM\Table(name="articles_music", indexes={@ORM\Index(name="fk_articles_music_articles1_idx", columns={"articles_id", "articles_categories_url"}), @ORM\Index(name="IDX_25B00ABE45A4DCA21EBAF6CC", columns={"articles_categories_url", "articles_id"})})
 * @ORM\Entity
 */
class ArticlesMusic
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
     * @ORM\Column(name="artist_name", type="string", length=200, nullable=false)
     */
    private $artistName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="play_time", type="time", nullable=false)
     */
    private $playTime;

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

    public function getArtistName(): ?string
    {
        return $this->artistName;
    }

    public function setArtistName(string $artistName): self
    {
        $this->artistName = $artistName;

        return $this;
    }

    public function getPlayTime(): ?\DateTimeInterface
    {
        return $this->playTime;
    }

    public function setPlayTime(\DateTimeInterface $playTime): self
    {
        $this->playTime = $playTime;

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
