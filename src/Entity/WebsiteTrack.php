<?php

namespace App\Entity;

use App\Repository\WebsiteTrackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WebsiteTrackRepository::class)
 */
class WebsiteTrack
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $visitor_id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $visit_datetime;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisitorId(): ?int
    {
        return $this->visitor_id;
    }

    public function setVisitorId(int $visitor_id): self
    {
        $this->visitor_id = $visitor_id;

        return $this;
    }

    public function getVisitDatetime(): ?\DateTimeInterface
    {
        return $this->visit_datetime;
    }

    public function setVisitDatetime(?\DateTimeInterface $visit_datetime): self
    {
        $this->visit_datetime = $visit_datetime;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }
}
