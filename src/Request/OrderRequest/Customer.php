<?php

namespace Nrgone\EsbClient\Request\OrderRequest;

final class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $eori;

    /**
     * @var bool
     */
    private $isGuest;

    /**
     * @var bool
     */
    private $isBusiness;

    /**
     * @var bool
     */
    private $spedition;

    /**
     * @var bool
     */
    private $isFirstTimeOrder;

    /**
     * @var bool
     */
    private $printInvoice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEori(): string
    {
        return $this->eori;
    }

    public function isGuest(): bool
    {
        return $this->isGuest;
    }

    public function isBusiness(): bool
    {
        return $this->isBusiness;
    }

    public function isSpedition(): bool
    {
        return $this->spedition;
    }

    public function isFirstTimeOrder(): bool
    {
        return $this->isFirstTimeOrder;
    }

    public function isPrintInvoice(): bool
    {
        return $this->printInvoice;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setEori(string $eori): void
    {
        $this->eori = $eori;
    }

    public function setIsGuest(bool $isGuest): void
    {
        $this->isGuest = $isGuest;
    }

    public function setIsBusiness(bool $isBusiness): void
    {
        $this->isBusiness = $isBusiness;
    }

    public function setSpedition(bool $spedition): void
    {
        $this->spedition = $spedition;
    }

    public function setIsFirstTimeOrder(bool $isFirstTimeOrder): void
    {
        $this->isFirstTimeOrder = $isFirstTimeOrder;
    }

    public function setPrintInvoice(bool $printInvoice): void
    {
        $this->printInvoice = $printInvoice;
    }
}
