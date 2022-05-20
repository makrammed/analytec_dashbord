<?php

namespace App\Entity;

use App\Repository\WebsiteVisitorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WebsiteVisitorRepository::class)
 */
class WebsiteVisitor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $country_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $visit_count;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timezone;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $create_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCountryId(): ?int
    {
        return $this->country_id;
    }

    public function setCountryId(?int $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }

    public function getVisitCount(): ?int
    {
        return $this->visit_count;
    }

    public function setVisitCount(?int $visit_count): self
    {
        $this->visit_count = $visit_count;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(?\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }
}
