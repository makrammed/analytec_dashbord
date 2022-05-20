<?php

namespace App\Entity;

use App\Repository\AccountMoveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountMoveRepository::class)
 */
class AccountMove
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
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payment_state;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amount_total;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $invoice_partner_display_name;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPaymentState(): ?string
    {
        return $this->payment_state;
    }

    public function setPaymentState(?string $payment_state): self
    {
        $this->payment_state = $payment_state;

        return $this;
    }

    public function getAmountTotal(): ?int
    {
        return $this->amount_total;
    }

    public function setAmountTotal(?int $amount_total): self
    {
        $this->amount_total = $amount_total;

        return $this;
    }

    public function getInvoicePartnerDisplayName(): ?string
    {
        return $this->invoice_partner_display_name;
    }

    public function setInvoicePartnerDisplayName(?string $invoice_partner_display_name): self
    {
        $this->invoice_partner_display_name = $invoice_partner_display_name;

        return $this;
    }
}
