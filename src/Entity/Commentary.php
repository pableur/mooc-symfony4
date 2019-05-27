<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaryRepository")
 */
class Commentary
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;
	
	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\shop")
	* @ORM\JoinColumn(nullable=true)
	*/
	private $shop;
	
	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\Item")
	* @ORM\JoinColumn(nullable=true)
	*/
	private $item;
	
	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\User")
	* @ORM\JoinColumn(nullable=true)
	*/
	private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getShop(): ?shop
    {
        return $this->shop;
    }

    public function setShop(?shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
