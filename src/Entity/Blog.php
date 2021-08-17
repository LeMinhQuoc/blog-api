<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BlogRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * @ApiResource(normalizationContext={"groups"={"blogItem"}})
 * @ORM\Entity(repositoryClass=BlogRepository::class)
 *
 */
class Blog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups({"blogItem"})
     *
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Tag::class)
     *
     * @Groups({"blogItem"})
     */
    private $idTag;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     *
     * @Groups({"blogItem"})
     */
    private $idOwner;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"blogItem"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     *
     * @Groups({"blogItem"})
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     *
     * @Groups({"blogItem"})
     */
    private $view;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Groups({"blogItem"})
     */
    private $timestamp;

    /**
     * @ORM\OneToMany(targetEntity=Like::class, mappedBy="idPost")
     */
    private $likes;


    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="idPost")
     */
    private $comments;


    /**
     * @SerializedName("likes")
     * @Groups({"blogItem"})
     */
    public function getCountLike(): ?int
    {
        return count($this->likes);
    }

    /**
     * @SerializedName("comments")
     * @Groups({"blogItem"})
     */
    public function getComments()
    {
        return $this->comments;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTag(): ?Tag
    {
        return $this->idTag;
    }

    public function setIdTag(?Tag $idTag): self
    {
        $this->idTag = $idTag;

        return $this;
    }

    public function getIdOwner(): ?User
    {
        return $this->idOwner;
    }

    public function setIdOwner(?User $idOwner): self
    {
        $this->idOwner = $idOwner;

        return $this;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getView(): ?int
    {
        return $this->view;
    }

    public function setView(int $view): self
    {
        $this->view = $view;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}
