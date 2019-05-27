<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShopRepository")
 */
class Shop
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $slogan;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbItem;
	
	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\Picture")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $pictureSticker;
	
	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\Picture")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $pictureSpotlight;
	
	private $url;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation;
    }

    public function setCreation(\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getNbItem(): ?int
    {
        return $this->nbItem;
    }

    public function setNbItem(?int $nbItem): self
    {
        $this->nbItem = $nbItem;

        return $this;
    }

    public function getPictureSticker(): ?Picture
    {
        return $this->pictureSticker;
    }

    public function setPictureSticker(?Picture $pictureSticker): self
    {
        $this->pictureSticker = $pictureSticker;

        return $this;
    }

    public function getPictureSpotlight(): ?Picture
    {
        return $this->pictureSpotlight;
    }

    public function setPictureSpotlight(?Picture $pictureSpotlight): self
    {
        $this->pictureSpotlight = $pictureSpotlight;

        return $this;
    }
	
	public function getUrl()
    {
		return("/mooc-symfony4/public/index.php/shop/".$this->id);
    }
}
