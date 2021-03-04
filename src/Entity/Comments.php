<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="fk_comments_articles1_idx", columns={"articles_id", "articles_categories_url"}), @ORM\Index(name="fk_comments_comments1_idx", columns={"comments_id"}), @ORM\Index(name="fk_comments_users1_idx", columns={"users_id1"}), @ORM\Index(name="IDX_5F9E962A45A4DCA21EBAF6CC", columns={"articles_categories_url", "articles_id"})})
 * @ORM\Entity
 */
class Comments
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
     * @ORM\Column(name="text", type="text", length=16777215, nullable=false)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="added", type="datetime", nullable=false)
     */
    private $added;

    /**
     * @var string|null
     *
     * @ORM\Column(name="users_id", type="string", length=200, nullable=true)
     */
    private $usersId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="users_login", type="string", length=200, nullable=true)
     */
    private $usersLogin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    private $parentId;

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

    /**
     * @var \Comments
     *
     * @ORM\ManyToOne(targetEntity="Comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comments_id", referencedColumnName="id")
     * })
     */
    private $comments;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id1", referencedColumnName="id")
     * })
     */
    private $usersId1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getAdded(): ?\DateTimeInterface
    {
        return $this->added;
    }

    public function setAdded(\DateTimeInterface $added): self
    {
        $this->added = $added;

        return $this;
    }

    public function getUsersId(): ?string
    {
        return $this->usersId;
    }

    public function setUsersId(?string $usersId): self
    {
        $this->usersId = $usersId;

        return $this;
    }

    public function getUsersLogin(): ?string
    {
        return $this->usersLogin;
    }

    public function setUsersLogin(?string $usersLogin): self
    {
        $this->usersLogin = $usersLogin;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

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

    public function getComments(): ?self
    {
        return $this->comments;
    }

    public function setComments(?self $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getUsersId1(): ?Users
    {
        return $this->usersId1;
    }

    public function setUsersId1(?Users $usersId1): self
    {
        $this->usersId1 = $usersId1;

        return $this;
    }


}
