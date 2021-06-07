<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Blog::class)
     */
    private $id_blog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_link;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBlog(): ?Blog
    {
        return $this->id_blog;
    }

    public function setIdBlog(?Blog $id_blog): self
    {
        $this->id_blog = $id_blog;

        return $this;
    }

    public function getImageLink(): ?string
    {
        return $this->image_link;
    }

    public function setImageLink(string $image_link): self
    {
        $this->image_link = $image_link;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(string $image_name): self
    {
        $this->image_name = $image_name;

        return $this;
    }
}
