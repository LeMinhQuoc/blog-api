<?php

namespace App\Entity;

use App\Repository\LikeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping\UniqueConstraint;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LikeRepository::class)
 * @ORM\Table(name="`like`",
 *    uniqueConstraints={
 *        @UniqueConstraint(name="unique_user_post",
 *            columns={"id_user_id", "id_post_id"})
 *    }
 * )
 */
class Like
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity=Blog::class)
     */
    private $idPost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdPost(): ?Blog
    {
        return $this->idPost;
    }

    public function setIdPost(?Blog $idPost): self
    {
        $this->idPost = $idPost;

        return $this;
    }
}
